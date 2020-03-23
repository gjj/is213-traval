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

# Create new PaymentIntent
@app.route("/payments/stripe", methods=['POST'])
def create_payment_intent():
    data = request.get_json()

    # extract json data from catalog
    r = requests.get("http://localhost:5002/orders/cart/" + str(data["user_id"]))
    cart = json.loads(r.text)

    payload = stripe.PaymentIntent.create(
        amount=int(cart["total_price"]) * 100,  # make sure to validate this
        currency="sgd",
        payment_method_types=["card"]
    )

    return payload, 200

# Update existing PaymentIntent by user's cart items
@app.route("/payments/update", methods=['POST'])
def update_payment_intent():
    data = request.get_json()

    # extract json data from catalog
    r = requests.get("http://localhost:5002/orders/cart/" + str(data["user_id"]))
    cart = json.loads(r.text)

    payload=stripe.PaymentIntent.modify(
        data["pi_id"],
        amount = int(cart["total_price"]) * 100,
        currency = "sgd",
        payment_method_types = ["card"],
        # metadata={"order_id": "1"}
    )

    return payload, 200


@app.route("/payments/stripe/lookup/<string:payment_intent_id>", methods = ['GET'])
def retrieve_payment_intent(payment_intent_id):
    payload=stripe.PaymentIntent.retrieve(
        payment_intent_id
    )

    return payload, 200


@app.route("/payments/stripe/webhook", methods = ['POST'])
def payment_stripe_webhook():
    payload=request.get_data()

    event=None

    try:
        event=stripe.Event.construct_from(
            json.loads(payload), stripe.api_key
        )
    except ValueError as e:
        return jsonify({'status': 'error', 'messages': ['Invalid payload.']}), 400

    if event.type == 'payment_intent.succeeded':
        payment_intent = event.data.object

        # mg = requests.post(
        #     "https://api.mailgun.net/v3/mailgun.traval.app/messages",
        #     auth=("api", ""),
        #     data={"from": "The Traval App <payments@traval.app>",
        #           "to": ["Goi Jia Jian", "jiajiannn@gmail.com"],
        #           "subject": "💳✅ Payment success event",
        #           "text": "payment_intent.success event is acknowledged."})
        # print(str(mg))

    return jsonify({'status': 'success', 'messages': ['payment_intent event acknowledged.']}), 200


if __name__ == '__main__':
    stripe.api_key = STRIPE_SECRET_KEY
    app.run(host='0.0.0.0', port=5003, debug=True)
