from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS
import datetime
import json

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
    datetime = db.Column(db.DateTime, nullable=False)
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


def retrieve_order_by_ID_in_json(id):
    order_item = Orders.query.filter_by(id=id).first()
    if order_item:
        return jsonify(order_item.json())
    return jsonify({"message":"Order not found."}), 404

def retrieve_order_in_json(id):
    order_item = Orders.query.all()
    if order_item:
        return jsonify(order_item.json())
    return jsonify({"message":"Order not found."}), 404

#UC1
#Creating order
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

#USC2
#view all information of order + catalog
@app.route("/orders/view/<string:id>")
def view_order(id):
    order_item = Orders.query.filter_by(id=id).first()
    if not order_item:
        return jsonify({"message":"Order not found."}), 404
    item_id = str(order_item.item_id)

    #extract json data from catalog
    travel_catalog_url = "http://localhost:5004/catalog_items"
    r = requests.get(travel_catalog_url + "/" + item_id)
    description = json.loads(r.text)["description"] #unpackage the json
    title = json.loads(r.text)["title"] 

    quantity = order_item.quantity
    datetime = order_item.datetime

    #store in dictionary
    reply = {"title":title, "description":description, "quantity": quantity, "datetime": datetime}

    return jsonify(reply)

#UC3
#Retrieving order data based on given order.id
@app.route("/orders/user/<string:user_id>")
def get_orders(user_id):
    order_item = Orders.query.filter_by(user_id=user_id).first()
    if order_item:
        reply = {"id":str(order_item.id)}
        return jsonify(reply)
    return jsonify({"message":"Order not found."}), 404

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5001, debug=True)
