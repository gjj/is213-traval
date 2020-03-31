from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS
import datetime
import json

from dotenv import load_dotenv
import os

import requests


load_dotenv()

DATABASE_PASSWORD = os.getenv("DATABASE_PASSWORD")
API_URL = os.getenv("API_URL")
travel_catalog_url = API_URL + ":5001/catalog_items"

app = Flask(__name__)
app.config['JSON_SORT_KEYS'] = False
CORS(app)

app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://traval:' + \
    DATABASE_PASSWORD + \
    '@traval.clkje4jkvizo.ap-southeast-1.rds.amazonaws.com:3306/traval_orders'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)


class Order(db.Model):
    __tablename__ = 'orders'

    id = db.Column(db.Integer, primary_key=True)
    user_id = db.Column(db.Integer, nullable=False)
    datetime = db.Column(db.DateTime, nullable=False)
    status = db.Column(db.String(20), nullable=False)

    def __init__(self, id, user_id, datetime, status):
        self.id = id
        self.user_id = user_id
        self.datetime = datetime
        self.status = status

    def json(self):
        return {"id": self.id, "user_id": self.user_id, "datetime": self.datetime, "status": self.status}


class OrderItem(db.Model):
    __tablename__ = 'order_items'

    id = db.Column(db.Integer, primary_key=True)
    order_id = db.Column(db.Integer, nullable=False)
    item_id = db.Column(db.Integer, nullable=False)
    price = db.Column(db.Float(precision=2), nullable=False)
    quantity = db.Column(db.Integer, nullable=False)

    def __init__(self, id, order_id, item_id, title, price, quantity, photo_urls):
        self.id = id
        self.order_id = order_id
        self.item_id = item_id
        self.title = title
        self.price = price
        self.quantity = quantity
        self.photo_urls = photo_urls

    def json(self):
        #return {"id": self.id, "order_id": self.order_id, "item_id": self.item_id, "price": self.price, "quantity": self.quantity}
        if hasattr(self, 'voucher_guid'):
            return {"id": self.id, "item_id": self.item_id, "title": self.title, "price": self.price, "quantity": self.quantity, "voucher_guid": self.voucher_guid, "photo_urls": self.photo_urls}
        else:
            return {"id": self.id, "item_id": self.item_id, "title": self.title, "price": self.price, "quantity": self.quantity, "photo_urls": self.photo_urls}

class CartItem(db.Model):
    __tablename__ = 'cart_items'

    user_id = db.Column(db.Integer, primary_key=True, nullable=False)
    item_id = db.Column(db.Integer, primary_key=True, nullable=False)
    quantity = db.Column(db.Integer, nullable=False)

    def __init__(self, user_id, item_id, title, price, quantity):
        self.user_id = user_id
        self.item_id = item_id
        self.title = title # Added on-the-fly
        self.price = price # Added on-the-fly
        self.quantity = quantity

    def json(self):
        return {"item_id": self.item_id, "title": self.title, "price": self.price, "quantity": self.quantity}

def retrieve_order_by_ID_in_json(id):
    order_item = Order.query.filter_by(id=id).first()
    if order_item:
        return jsonify(order_item.json())
    return jsonify({"status": "error", "message": "Order not found."}), 404

def retrieve_order_in_json():
    order_item = {"order_items": [item.json() for item in Order.query.all()]}
    if order_item:
        return jsonify(order_item)
    return jsonify({"status": "error", "message": "Order not found."}), 404

# ADD or Update Cart Item
@app.route("/orders/cart/update", methods=['POST'])
def add_cart_item():
    data = request.get_json()

    # Handle empty JSON query
    if not data:
        return jsonify({"status": "error", "message": "No cart item found in the request."}), 500
    if int(data["quantity"]) < 0:
        return jsonify({"status": "error", "message": "Item quantity cannot be less than 0."}), 500

    cart_item = CartItem(title=None, price=None, **data)
    
    try:
        if int(data["quantity"]) == 0:
            # Delete if quantity is set to zero
            CartItem.query.filter_by(user_id=data["user_id"]).filter_by(item_id=data["item_id"]).delete()
        else:
            # Insert or update if exists, when quantity > 0
            db.session.merge(cart_item) 
        db.session.commit()

    except error:
        return jsonify({"status": "error", "message": "An error occurred when adding the item to cart."}), 500

    return jsonify({"user_id": data["user_id"], "item_id": data["item_id"], "quantity": data["quantity"]}), 201

# Clear cart
@app.route("/orders/cart/clear", methods=['POST'])
def clear_cart():
    data = request.get_json()

    # Handle empty JSON query
    if not data:
        return jsonify({"status": "error", "message": "No JSON data received in the request."}), 500
    if 'user_id' not in data:
        return jsonify({"status": "error", "message": "The key user_id is not found in the request."}), 500

    try:
        CartItem.query.filter_by(user_id=data["user_id"]).delete()
        db.session.commit()
    except error:
        return jsonify({"status": "error", "message": "An error occurred when clearing the user's cart"}), 500

    return jsonify({"status": "success", "message": "Cart is cleared."}), 200

# List all card items by user
@app.route("/orders/cart/<string:user_id>")
def get_cart_items_by_user_id(user_id):
    items = get_cart_items(user_id)
    total_price = sum([item.price * item.quantity for item in items])
    items = [item.json() for item in items]

    #store in dictionary
    reply = {
        "items": items,
        "total_price": total_price
    }

    return jsonify(reply), 200

# Helper function to get cart items (with title, desc and price)
def get_cart_items(user_id):
    items = CartItem.query.filter_by(user_id=user_id).all()
    
    for item in items:
        item_id = str(item.item_id)

        # extract json data from catalog
        r = requests.get(travel_catalog_url + "/" + item_id)
        data = json.loads(r.text)
        item.title = data["title"]
        item.description = data["description"]
        item.price = data["price"]

    return items

# UC1
# Creating order
""" Test POST with this format
{
  "user_id": "2",
  "status": "Pending Payment",
  "items": {
    "item_id": "3",
    "quantity": "4",
  }
}
"""
@app.route("/orders", methods=['POST'])
def create_order():
    data = request.get_json()

    # Handle empty JSON query
    if not data:
        return jsonify({"status": "error", "message": "No order details!"}), 500

    time_now = datetime.datetime.now() # Get current timestamp

    order = Order(id=None, user_id=data['user_id'], datetime=time_now, status='Pending Payment')

    if len(data['items']) <= 0:
        return jsonify({"status": "error", "message": "Unable to create order as there are no items in this order list."}), 500
    try:
        db.session.add(order)
        db.session.commit()
        print(order.id)

        for item in data["items"]:
            r = requests.get(travel_catalog_url + "/" + str(item['item_id']))
            catalog_item = json.loads(r.text)
            price = catalog_item['price']
                        
            order_item = OrderItem(id=None, title=None, photo_urls=None, order_id=order.id, item_id=item['item_id'], price=price, quantity=item['quantity'])
            db.session.add(order_item)
            db.session.commit()
            
    except Exception as error:
        #db.session.rollback()
        print(error)
        return jsonify({"status": "error", "message": "An error occurred when creating the order."}), 500

    return jsonify(order.json()), 201

@app.route("/orders/<string:id>", methods=['POST'])
def update_order(id):
    data = request.get_json()
    
    # Handle empty JSON query
    if not data:
        return jsonify({"status": "error", "message": "No order details were given."}), 500
    try:
        order = Order(id=id, status=data['status'], user_id=None, datetime=None)
        db.session.query(Order).filter_by(id=order.id).update({"status": order.status})
        db.session.commit()
        
    except Exception as error:
        return jsonify({"status": "error", "message": "An error occurred when updating the order."}), 500

    return jsonify(order.json()), 201

# USC2
# view all information of order + catalog
@app.route("/orders/<string:id>")
def view_order(id):
    order = Order.query.filter_by(id=id).first()
    if not order:
        return jsonify({"message": "Order not found."}), 404

    items = get_order_items(id)
    total_price = sum([item.price * item.quantity for item in items])
    items = [item.json() for item in items]

    #store in dictionary
    reply = {
        "id": order.id,
        "user_id": order.user_id,
        "datetime": order.datetime,
        "status": order.status,
        #"currency": "SGD",
        "total_price": total_price,
        "items": items
    }

    return jsonify(reply), 200


def get_order_items(order_id):
    items = OrderItem.query.filter_by(order_id=order_id).all()

    for item in items:
        item_id = str(item.item_id)
        voucher_guid = get_voucher(str(item.id)) # Get by order item ID rather than item ID
        # extract json data from catalog
        r = requests.get(travel_catalog_url + "/" + item_id)
        data = json.loads(r.text)
        item.title = data["title"]
        item.description = data["description"]
        item.photo_urls = data["photo_urls"]

        if voucher_guid:
            item.voucher_guid = voucher_guid

    return items

def get_voucher(order_item_id):
    r = requests.get(API_URL + ":5004/vouchers/item/" + order_item_id)
    data = json.loads(r.text)
    
    if 'guid' in data:
        return data["guid"]
    return None

# UC3
# Retrieving all paid orders by user ID
@app.route("/orders/user/<string:user_id>")
def get_paid_orders_by_user(user_id):
    # Show only paid orders
    orders = Order.query.filter_by(user_id=user_id).filter_by(status='Paid').all()
    orders_json = []
    for order in orders:
        items = get_order_items(order.id)
        total_price = sum([item.price * item.quantity for item in items])
        items = [item.json() for item in items]

        # store in dictionary
        order_json = {
            "id": order.id,
            "user_id": order.user_id,
            "datetime": order.datetime,
            "status": order.status,
            #"currency": "SGD",
            "total_price": total_price,
            "items": items
        }

        orders_json.append(order_json)
        
    return jsonify(orders_json), 200

# Get order item by ID
@app.route("/orders/item/<string:id>")
def get_order_item(id):
    item = OrderItem.query.filter_by(id=id).first()
    
    if item:
        r = requests.get(travel_catalog_url + "/" + str(item.item_id))
        data = json.loads(r.text)
        item.title = data["title"]
        item.description = data["description"]
        item.photo_urls = data["photo_urls"]

        return jsonify(item.json()), 200
    else:
        return jsonify({"message": "An order item is not found with this ID."}), 404

# Get entire order details by order item ID
@app.route("/orders/item/<string:id>/all")
def get_order_details_by_order_item_id(id):
    item = OrderItem.query.filter_by(id=id).first()
    
    if item:
        order = Order.query.filter_by(id=item.order_id).first()
        
        items = get_order_items(item.order_id)
        total_price = sum([item.price * item.quantity for item in items])
        items = [item.json() for item in items]

        #store in dictionary
        reply = {
            "id": order.id,
            "user_id": order.user_id,
            "datetime": order.datetime,
            "status": order.status,
            #"currency": "SGD",
            "total_price": total_price,
            "items": items
        }

        return jsonify(reply), 200
    else:
        return jsonify({"message": "An order item is not found with this ID."}), 404

# Get all orders
@app.route("/orders")
def get_all_orders():
    orders = Order.query.all()
    orders_json = []
    for order in orders:
        items = get_order_items(order.id)
        total_price = sum([item.price * item.quantity for item in items])
        items = [item.json() for item in items]

        # store in dictionary
        order_json = {
            "id": order.id,
            "user_id": order.user_id,
            "datetime": order.datetime,
            "status": order.status,
            #"currency": "SGD",
            "total_price": total_price,
            "items": items
        }

        orders_json.append(order_json)
        
    return jsonify(orders_json), 200


if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5002, debug=True)