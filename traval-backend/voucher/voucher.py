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


@app.route("/vouchers")
def get_all_voucher(order_id):
    all_voucher = Vouchers.query.filter_by(order_id=order_id).first()
    if all_voucher:
        reply = {"id":id, "status":status}
        return jsonify(reply)

    return jsonify({"message":"Voucher not found."}), 404

def merchant_scan_voucher(id):
    scaned_voucher = Vouchers.query.filter_by(id=id).first()
    scan_status= scaned_voucher.status
    if scaned_voucher:
        reply = {"order_id":order_id, "status":status}
        return jsonify(reply)

    return jsonify({"message":"Voucher not found."}), 404

#unconfirm#########
# @app.route("/voucher", methods=['PUT']) 
# def merchant_update_redeem_status(id, status):
#     voucher_status= Vouchers.query.filter_by(id=id).first()
#     voucher_status[4]['status']=status
#     data = request.get_json()
#     item = CatalogItem(data)





# @app.route("/voucher", methods=['POST'])
# def create_voucher():
    # data = request.get_json()
    # item = CatalogItem(**data)

    # if (CatalogItem.query.filter_by(id=id).first()):
    #     return jsonify({"message": "A book with isbn13 '{}' already exists.".format(isbn13)}), 400
    
    # try:
    #     db.session.add(item)
    #     db.session.commit()
    # except:
    #     return jsonify({"message": "An error occurred creating the catalog item."}), 500
    # return jsonify(item.json()), 201


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

    # if (CatalogItem.query.filter_by(id=id).first()):
    #     return jsonify({"message": "A book with isbn13 '{}' already exists.".format(isbn13)}), 400
    
    # try:
    #     db.session.add(item)
    #     db.session.commit()
    # except:
    #     return jsonify({"message": "An error occurred creating the catalog item."}), 500
    # return jsonify(item.json()), 201
    
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
    channel.basic_ack(delivery_tag=method.delivery_tag) # 

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
    app.run(port=5006, debug=True)
    receivePayment()
