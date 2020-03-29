from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS
import datetime
import json

from dotenv import load_dotenv
import os
import requests

#AMQP
import pika
import uuid
import csv
import sys

load_dotenv()
API_URL = os.getenv("API_URL")
DATABASE_PASSWORD = os.getenv("DATABASE_PASSWORD")

app = Flask(__name__)
app.config['JSON_SORT_KEYS'] = False
CORS(app)

app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://traval:' + DATABASE_PASSWORD + '@traval.clkje4jkvizo.ap-southeast-1.rds.amazonaws.com:3306/traval_vouchers'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)

class Voucher(db.Model):
    __tablename__ = 'vouchers'

    id = db.Column(db.Integer, primary_key=True)
    guid = db.Column(db.String(36), nullable=False)
    user_id = db.Column(db.Integer, nullable=False)
    order_item_id = db.Column(db.Integer, nullable=False)
    valid_from = db.Column(db.Date, nullable=False)
    status = db.Column(db.String(10), nullable=False)
    
    def __init__(self, id, guid, user_id, order_item_id, valid_from, status):
        self.id = id
        self.guid = guid
        self.user_id = user_id
        self.order_item_id = order_item_id
        self.valid_from = valid_from
        self.status = status

    def json(self):
        return {"id": self.id, "guid": self.guid, "user_id": self.user_id, "order_item_id": self.order_item_id, "valid_from": self.valid_from, "status": self.status}
   

#UC2 - Traval Booking UI interaction (getting voucher info)
@app.route("/vouchers/guid/<string:guid>")
def get_voucher_by_guid(guid):
    voucher = Voucher.query.filter_by(guid=guid).first()

    if voucher:
        r = requests.get(API_URL + ":5002/orders/item/" + str(voucher.order_item_id))
        data = json.loads(r.text)

        response = voucher.json()
        response.update(data)
        return jsonify(response)

    return jsonify({"message":"Voucher not found for this voucher ID."}), 404

#UC2 - Traval Booking UI interaction (getting voucher info)
@app.route("/vouchers/item/<string:order_item_id>")
def get_voucher_by_order_item_id(order_item_id):
    voucher = Voucher.query.filter_by(order_item_id=order_item_id).first()
    if voucher:
        return jsonify(voucher.json())
    return jsonify({"message":"Voucher not found for this order item ID."}), 404

#UC2 - Merchant Traval UI interaction (getting voucher info)
@app.route("/vouchers/merchant/<string:vouchers_id>")
def merchant_scan_voucher(vouchers_id):
    all_voucher = Voucher.query.filter_by(vouchers_id=vouchers_id).first()
    if all_voucher:
        reply = {"id":all_voucher.order_id}
        return jsonify(reply)
    return jsonify({"message":"Voucher not found."}), 404

#UC2 - AMQP to notification (automatically sent to notification api after voucher status changed)
@app.route("/vouchers/merchant/redeem/<string:voucher_status>")
def sent_to_notification():
    pass

#unconfirm#########
#UC2 - Merchant Traval UI interaction (Voucher status change)
@app.route("/voucher", methods=['PUT']) 
def merchant_redeem(id):
    voucher_status= Voucher.query.filter_by(id=id).first()
    voucher_status[4]['status']=status
    data = request.get_json()
    item = Voucher(data)

#creating voucher (for testing)
@app.route("/voucher", methods=['POST'])
def create_voucher():
    data = request.get_json()
    item = Voucher(**data)

    if (Voucher.query.filter_by(id=Voucher.id).first()):
        return jsonify({"message": "A voucher with voucher id '{}' already exists.".format(Voucher.id)}), 400
    
    try:
        db.session.add(item)
        db.session.commit()
    except:
        return jsonify({"message": "An error occurred creating the voucher."}), 500
    return jsonify(item.json()), 201


if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5004, debug=True)
    receivePayment()
