from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS
from dotenv import load_dotenv
import datetime
import json
import os
import requests
import stripe
import pika
import uuid
import csv
import sys

load_dotenv()

DATABASE_PASSWORD = os.getenv("DATABASE_PASSWORD")
API_URL = os.getenv("API_URL")
STRIPE_PUBLISHABLE_KEY = os.getenv("STRIPE_PUBLISHABLE_KEY")
STRIPE_SECRET_KEY = os.getenv("STRIPE_SECRET_KEY")

app = Flask(__name__)
app.config['JSON_SORT_KEYS'] = False
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://traval:' + DATABASE_PASSWORD + \
    '@traval.clkje4jkvizo.ap-southeast-1.rds.amazonaws.com:3306/traval_payments'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

CORS(app)
db = SQLAlchemy(app)

class Payment(db.Model):
    __tablename__ = 'payments'

    id = db.Column(db.Integer, primary_key=True)
    user_id = db.Column(db.Integer, nullable=False)
    order_id = db.Column(db.Integer, nullable=False)
    payment_intent_id = db.Column(db.String(50), nullable=False)
    amount = db.Column(db.Float(precision=2), nullable=False)
    status = db.Column(db.String(10), nullable=False)
    datetime = db.Column(db.DateTime, nullable=False)

    def __init__(self, id, user_id, order_id, payment_intent_id, amount, status, datetime):
        self.id = id
        self.user_id = user_id
        self.order_id = order_id
        self.payment_intent_id = payment_intent_id
        self.amount = amount
        self.status = status
        self.datetime = datetime

    def json(self):
        return {"id": self.id, "user_id": self.user_id, "order_id": self.order_id, "payment_intent_id": self.payment_intent_id, "amount": self.amount, "status": self.status, "datetime": self.datetime}

# POST /payments/stripe
# Create new PaymentIntent, this will connect to Stripe API
# @params JSON data {"user_id": 2, "total_price": 28.5}
@app.route("/payments/stripe", methods=['POST'])
def create_payment_intent():
    data = request.get_json()
    
    if not data:
        return jsonify({'status': 'error', 'message': 'Invalid payload.'}), 400

    # extract json data from catalog
    r = requests.get(API_URL + ":5002/orders/cart/" + str(data["user_id"]))
    cart = json.loads(r.text)

    payload = stripe.PaymentIntent.create(
        amount=int(float(cart["total_price"]) * 100),  # make sure to validate this
        currency="sgd",
        payment_method_types=["card"]
    )

    return payload, 200

# POST /payments/update
# Update existing PaymentIntent's amount to charge using 
# total price derived from a user's cart items
# Reason is because we do not want frontend users to tamper with the charge amount
# @params JSON data {"user_id": 2}, the key "order_id" is optional
@app.route("/payments/update", methods=['POST'])
def update_payment_intent():
    data = request.get_json()

    try:
        # extract json data from user's cart
        r = requests.get(API_URL + ":5002/orders/cart/" + str(data["user_id"]))
        cart = json.loads(r.text)

        if "order_id" in data:
            payload = stripe.PaymentIntent.modify(
                data["payment_intent_id"],
                amount=int(float(cart["total_price"]) * 100),
                metadata={"order_id": data["order_id"]}
            )
        else:
            payload = stripe.PaymentIntent.modify(
                data["payment_intent_id"],
                amount=int(float(cart["total_price"]) * 100)
            )

        return payload, 200
    except ValueError as e:
        return jsonify({'status': 'error', 'message': 'Invalid payload.'}), 400

# GET /payments/stripe/lookup
# Retrieves the entire PaymentIntent object from Stripe, using a given PaymentIntent ID
# @params payment_intent_id a Stripe PaymentIntent ID that looks like e.g. pi_e5AFJEz32eAKds088
@app.route("/payments/stripe/lookup/<string:payment_intent_id>", methods=['GET'])
def retrieve_payment_intent(payment_intent_id):
    payload = stripe.PaymentIntent.retrieve(
        payment_intent_id
    )

    return payload, 200

# POST /payments/stripe/webhook
# Receives payment_intent.* events from Stripe
# @params JSON data (from Stripe)
@app.route("/payments/stripe/webhook", methods=['POST'])
def payment_stripe_webhook():
    payload = request.get_json()

    event = None

    try:
        event = stripe.Event.construct_from(
            payload, stripe.api_key
        )
    except ValueError as e:
        return jsonify({'status': 'error', 'message': 'Invalid payload.'}), 400

    # If Stripe calls us to tell us that somebody has successfully made payment...
    if event.type == 'payment_intent.succeeded':
        payment_intent = event.data.object
        
        # default username / password to the borker are both 'guest'
        hostname = "host.docker.internal" # default broker hostname. Web management interface default at http://localhost:15672
        port = 5672 # default messaging port.
        exchangename = "traval.payments"
        connection = pika.BlockingConnection(pika.ConnectionParameters(host=hostname, port=port))
        channel = connection.channel()

        channel.exchange_declare(exchange=exchangename, exchange_type='topic')
        channel.queue_declare(queue='order.update_status', durable=True)
        channel.queue_bind(exchange=exchangename, queue='order.update_status', routing_key='order.update.*') # make sure the queue is bound to the exchange
        
        channel.queue_declare(queue='voucher.create_voucher', durable=True)
        channel.queue_bind(exchange=exchangename, queue='voucher.create_voucher', routing_key='voucher.create') # make sure the queue is bound to the exchange
        
        # prepare the message body content
        data = {
            'payment_intent_id': payment_intent.id,
            'order_id': payment_intent.metadata.order_id,
            'status': 'Paid'
        }

        message = json.dumps(data, default=str) # convert a JSON object to a string

        channel.basic_publish(
            exchange=exchangename,
            routing_key='order.update.success',
            body=message,
            properties=pika.BasicProperties(
                delivery_mode=2,  # make message persistent
            ))
        
        channel.basic_publish(
            exchange=exchangename,
            routing_key='voucher.create',
            body=message,
            properties=pika.BasicProperties(
                delivery_mode=2,  # make message persistent
            ))
        connection.close()

        time_now = datetime.datetime.now() # Get current timestamp
        payment = Payment(
            id=None, user_id=2, order_id=payment_intent.metadata.order_id,
            payment_intent_id=payment_intent.id, amount=int(payment_intent.amount)/100,
            status="Success", datetime=time_now)
        db.session.add(payment)
        db.session.commit()

        # mg = requests.post(
        #     "https://api.mailgun.net/v3/mailgun.traval.app/messages",
        #     auth=("api", ""),
        #     data={"from": "The Traval App <payments@traval.app>",
        #           "to": ["Goi Jia Jian", "jiajiannn@gmail.com"],
        #           "subject": "💳✅ Payment success event",
        #           "text": "payment_intent.success event is acknowledged."})
        # print(str(mg))

    return jsonify({'status': 'success', 'message': 'payment_intent event acknowledged.'}), 200


if __name__ == '__main__':
    stripe.api_key = STRIPE_SECRET_KEY
    app.run(host='0.0.0.0', port=5003, debug=True)
