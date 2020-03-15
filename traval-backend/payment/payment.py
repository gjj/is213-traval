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

load_dotenv()
DATABASE_PASSWORD = os.getenv("DATABASE_PASSWORD")

app = Flask(__name__)
app.config['JSON_SORT_KEYS'] = False
CORS(app)

app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://traval:' + DATABASE_PASSWORD + '@traval.clkje4jkvizo.ap-southeast-1.rds.amazonaws.com:3306/traval_payments'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)

class Payment(db.Model):
    __tablename__ = 'payments'

    id = db.Column(db.Integer, primary_key=True)
    user_id = db.Column(db.Integer, nullable=False)
    order_id = db.Column(db.Integer, nullable=False)
    price = db.Column(db.Float(precision=2), nullable=False)
    status = db.Column(db.String(10), nullable=False)

    def __init__(self, id, user_id, order_id, price, status):
        self.id = id
        self.user_id = user_id
        self.order_id = order_id
        self.price = price
        self.status = status

    def json(self):
        return {"id": self.id, "user_id": self.user_id, "order_id": self.order_id, "price": self.price, "status": self.status}

def AMQP():
    hostname = "localhost" # default broker hostname. 
    port = 5672 # default messaging port.
    connection = pika.BlockingConnection(pika.ConnectionParameters(host=hostname, port=port))
    channel = connection.channel()
    # set up the exchange if the exchange doesn't exist
    exchangename="payment_direct"
    channel.exchange_declare(exchange=exchangename, exchange_type='direct') 

    order = {"user_id": 1, "order_id": 1, "applicable_date": "2020-03-15"}
    message = json.dumps(order, default=str) # convert a JSON object to a string

    #make sure queue exist and durable
    channel.queue_declare(queue="voucher", durable = True)

    #vlind queue to exchange
    channel.queue_bind(exchange=exchangename, queue="voucher", routing_key="voucher.payment")

    #send the message to voucher
    channel.basic_publish(exchange=exchangename, routing_key="voucher.payment", body=message)


@app.route("/payment", methods=['POST'])
def create_payment():
    data = request.get_json()
    id = data["id"]
    quantity = data["quantity"]
    catalog_price = data["price"]
    payment_price = catalog_price * quantity
    AMQP()
    return {"payment_price": payment_price}

if __name__ == '__main__':
    app.run(port=5002, debug=True)
