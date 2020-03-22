from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS
import datetime
import json

from dotenv import load_dotenv
import os
import requests

import stripe

# AMQP
import pika
import uuid
import csv
import sys

load_dotenv()
DATABASE_PASSWORD = os.getenv("DATABASE_PASSWORD")
STRIPE_PUBLISHABLE_KEY = os.getenv("STRIPE_PUBLISHABLE_KEY")
STRIPE_SECRET_KEY = os.getenv("STRIPE_SECRET_KEY")

app = Flask(__name__)
app.config['JSON_SORT_KEYS'] = False
CORS(app)

app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://traval:' + DATABASE_PASSWORD + \
    '@traval.clkje4jkvizo.ap-southeast-1.rds.amazonaws.com:3306/traval_payments'
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
    hostname = "localhost"  # default broker hostname.
    port = 5672  # default messaging port.
    connection = pika.BlockingConnection(
        pika.ConnectionParameters(host=hostname, port=port))
    channel = connection.channel()
    # set up the exchange if the exchange doesn't exist
    exchangename = "payment_direct"
    channel.exchange_declare(exchange=exchangename, exchange_type='direct')

    payment_info = {"user_id": 1, "order_id": 1,
                    "applicable_date": "2020-03-15"}
    # convert a JSON object to a string
    message = json.dumps(payment_info, default=str)

    # make sure queue exist and durable
    channel.queue_declare(queue="voucher", durable=True)

    # vlind queue to exchange
    channel.queue_bind(exchange=exchangename, queue="voucher",
                       routing_key="voucher.payment")

    # send the message to voucher
    channel.basic_publish(exchange=exchangename,
                          routing_key="voucher.payment", body=message)

    connection.close()


@app.route("/payments", methods=['POST'])
def create_payment():
    data = request.get_json()
    id = data["id"]
    quantity = data["quantity"]
    catalog_price = data["price"]
    payment_price = catalog_price * quantity
    AMQP()
    return {"payment_price": payment_price}

@app.route("/payments/stripe/test", methods=['GET'])
def create_payment_intent_test():
    data = request.get_data()

    payload = stripe.PaymentIntent.create(
        amount=2880,
        currency="sgd",
        payment_method_types=["card"]
    )

    return payload

@app.route("/payments/stripe", methods=['POST'])
def create_payment_intent():
    data = request.get_data()

    payload = stripe.PaymentIntent.create(
        amount=data["amount"],
        currency="sgd",
        payment_method_types=["card"]
    )

    return payload

@app.route("/payments/stripe", methods=['PUT'])
def update_payment_intent():
    data = request.get_data()

    payload = stripe.PaymentIntent.modify(
        data["pi_id"],
        amount=data["amount"],
        currency="sgd",
        payment_method_types=["card"],
        metadata={"order_id": "1"}
    )

    return payload

@app.route("/payments/stripe/webhook", methods=['POST'])
def payment_stripe_webhook():
    payload = request.get_data()

    event = None

    try:
        event = stripe.Event.construct_from(
            json.loads(payload), stripe.api_key
        )
    except ValueError as e:
        return jsonify({'status': 'error', 'messages': ['Invalid payload.']}), 400
    
    if event.type == 'payment_intent.succeeded':
        payment_intent = event.data.object 
    
    return jsonify({'status': 'success', 'messages': ['payment_intent.succeeded event acknowledged.']}), 200

if __name__ == '__main__':
    stripe.api_key = STRIPE_SECRET_KEY
    app.run(host='0.0.0.0', port=5003, debug=True)
