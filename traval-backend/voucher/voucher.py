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
DATABASE_PASSWORD = os.getenv("DATABASE_PASSWORD")

app = Flask(__name__)
app.config['JSON_SORT_KEYS'] = False
CORS(app)

app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://traval:' + DATABASE_PASSWORD + '@traval.clkje4jkvizo.ap-southeast-1.rds.amazonaws.com:3306/traval_vouchers'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)

class Vouchers(db.Model):
    __tablename__ = 'vouchers'

    id = db.Column(db.Integer, primary_key=True)
    user_id = db.Column(db.Integer, nullable=False)
    order_id = db.Column(db.Integer, nullable=False)
    applicable_date = db.Column(db.Date, nullable=False)
    status = title = db.Column(db.String(8), nullable=False)


    def __init__(self, id, user_id, order_id, applicable_date, status):
        self.id = id
        self.user_id = user_id
        self.order_id = order_id
        self.applicable_date = applicable_date
        self.status = status

    def json(self):
        return {"id": self.id, "user_id": self.user_id, "order_id": self.order_id, "applicable_date": self.applicable_date, "status": self.status}

#UC2 - Traval Booking UI interaction (getting voucher info)
@app.route("/vouchers/<string:order_id>")
def get_all_voucher(order_id):
    all_voucher = Vouchers.query.filter_by(order_id=order_id).first()
    if all_voucher:
        reply = {"id":all_voucher.id, "status":all_voucher.status}
        return jsonify(reply)
    return jsonify({"message":"Voucher not found."}), 404

#UC2 - Merchant Traval UI interaction (getting voucher info)
@app.route("/vouchers/merchant/<string:vouchers_id>")
def merchant_scan_voucher(vouchers_id):
    all_voucher = Vouchers.query.filter_by(vouchers_id=vouchers_id).first()
    if all_voucher:
        reply = {"id":all_voucher.order_id}
        return jsonify(reply)
    return jsonify({"message":"Voucher not found."}), 404

#UC2 - AMQP to notification (automatically sent to notification api after voucher status changed)
@app.route("/vouchers/merchant/redeem/<string:voucher_status>")
def sent_to_notification():
    hostname = "localhost" # default broker hostname. 
    port = 5672 # default messaging port.
    connection = pika.BlockingConnection(pika.ConnectionParameters(host=hostname, port=port))
    channel = connection.channel()
    # set up the exchange if the exchange doesn't exist
    exchangename="voucher_direct"
    channel.exchange_declare(exchange=exchangename, exchange_type='direct') 


#unconfirm#########
#UC2 - Merchant Traval UI interaction (Voucher status change)
@app.route("/voucher", methods=['PUT']) 
def merchant_redeem(id):
    voucher_status= Vouchers.query.filter_by(id=id).first()
    voucher_status[4]['status']=status
    data = request.get_json()
    item = Vouchers(data)

#creating voucher (for testing)
@app.route("/voucher", methods=['POST'])
def create_voucher():
    data = request.get_json()
    item = Vouchers(**data)

    if (Vouchers.query.filter_by(id=Vouchers.id).first()):
        return jsonify({"message": "A voucher with voucher id '{}' already exists.".format(Vouchers.id)}), 400
    
    try:
        db.session.add(item)
        db.session.commit()
    except:
        return jsonify({"message": "An error occurred creating the voucher."}), 500
    return jsonify(item.json()), 201


#UC1 - wip (cannot test cuz my rabbit died lol)
def receivePayment():

    hostname = "localhost" # default broker hostname. 
    port = 5672 # default messaging port.
    connection = pika.BlockingConnection(pika.ConnectionParameters(host=hostname, port=port))
    channel = connection.channel()
    # set up the exchange if the exchange doesn't exist
    exchangename="payment_direct"
    channel.exchange_declare(exchange=exchangename, exchange_type='direct') 

    #empty queue
    channelqueue = channel.queue_declare(queue='', exclusive=True) 

    channelqueue = channel.queue_declare(queue="voucher", durable=True) 
    queue_name = channelqueue.method.queue

    channel.queue_bind(exchange=exchangename, queue=queue_name, routing_key='voucher.payment') 

    channel.basic_qos(prefetch_count=1) 

    #consume
    channel.basic_consume(queue=queue_name, on_message_callback=callback, auto_ack=True)
    channel.basic_consume(queue=queue_name)
    
    channel.start_consuming() 

def callback(channel, method, properties, body): # required signature for the callback; no return
    print("Received an order by " + __file__)
    result = processVoucher(json.loads(body))

    json.dump(result, sys.stdout, default=str) 
    channel.basic_ack(delivery_tag=method.delivery_tag)

#wip
def processVoucher(data):
    print("Processing an Voucher Creation:")
    voucher_id = 1
    user_id = data["user_id"]
    order_id = data["order_id"]
    applicable_date = "2020-03-15"
    status = "gucci"
    order = Vouchers(voucher_id, user_id, order_id, applicable_date, status)
    
    try:
        db.session.add(order)
        db.session.commit()
    except:
        return jsonify({"message": "An error occurred when creating the order"}), 500
    
    return jsonify(order.json()), 201

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5006, debug=True)
    receivePayment()
