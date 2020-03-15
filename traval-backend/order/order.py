from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS
import datetime

from dotenv import load_dotenv
import os

import requests
travel_catalog_url = "http://localhost:5004/catalog_items"

load_dotenv()

DATABASE_PASSWORD = os.getenv("DATABASE_PASSWORD")

app = Flask(__name__)
app.config['JSON_SORT_KEYS'] = False
CORS(app)

app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://traval:' + DATABASE_PASSWORD + '@traval.clkje4jkvizo.ap-southeast-1.rds.amazonaws.com:3306/traval_orders'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)

class Orders(db.Model):
    __tablename__ = 'orders'

    id = db.Column(db.Integer, primary_key=True)
    user_id = db.Column(db.Integer, nullable=False)
    item_id = db.Column(db.Integer, nullable=False)
    quantity = db.Column(db.Integer, nullable=False)
    datetime = db.Column(db.Date, nullable=False)
    status = db.Column(db.Float(precision=2), nullable=False)

    def __init__(self, id, user_id, item_id, quantity, datetime, status):
        self.id = id
        self.user_id = user_id
        self.item_id = item_id
        self.quantity = quantity
        self.datetime = datetime
        self.status = status

    def json(self):
        return {"id": self.id, "user_id": self.user_id, "item_id": self.item_id,"quantity": self.quantity, "datetime": self.datetime, "status": self.status}


"""UC2"""
#Send request to traval catalog -> return activity details -> return activity + order details

@app.route("/orders/get_activity/<string:id>")
def get_activity_details(id):
    #send request to travel catalog 
    travel_catalog_url = "http://localhost:5004/catalog_items/" + id
    r = requests.get(travel_catalog_url).json()
    return r.json()

#UC3
#Retrieving order data based on given order.id
@app.route("/orders/<string:id>")
def get_orders(id):
    order_item = Orders.query.filter_by(id=id).first()
    if order_item:
        return jsonify(order_item.json())
    return jsonify({"message":"Order not found."}), 404



""" Test POST with this format
{
	"id": "1",
  "user_id": "2",
  "item_id": "3",
  "quantity": "4",
  "datetime": "2020-03-15",
  "status": 200
}
"""
#UC1
#Creating order
@app.route("/orders", methods=['POST'])
def create_orders():
    data = request.get_json()
    order = Orders(**data)
    try:
        db.session.add(order)
        db.session.commit()
    except:
        return jsonify({"message": "An error occurred when creating the order"}), 500
    
    return jsonify(order.json()), 201


# @app.route("/catalog-items")
# def get_all():
#     return jsonify({"catalog-items": [book.json() for book in CatalogItem.query.all()]})

# @app.route("/catalog-items/<string:id>")
# def find_by_id(id):
#     item = CatalogItem.query.filter_by(id=id).first()
#     if item:
#         return jsonify(item.json())
#     return jsonify({"message": "Item not found."}), 404

# @app.route("/catalog-items", methods=['POST'])
# def create_item():
#     data = request.get_json()
#     item = CatalogItem(**data)

#     # if (CatalogItem.query.filter_by(id=id).first()):
#     #     return jsonify({"message": "A book with isbn13 '{}' already exists.".format(isbn13)}), 400
    
#     try:
#         db.session.add(item)
#         db.session.commit()
#     except:
#         return jsonify({"message": "An error occurred creating the catalog item."}), 500
#     return jsonify(item.json()), 201

if __name__ == '__main__':
    app.run(port=5001, debug=True)
