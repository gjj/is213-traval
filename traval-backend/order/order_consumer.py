from order import Order
from flask_sqlalchemy import SQLAlchemy
import pika
import time
import json
import os

load_dotenv()

DATABASE_PASSWORD = os.getenv("DATABASE_PASSWORD")
API_URL = os.getenv("API_URL")

app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://traval:' + \
    DATABASE_PASSWORD + \
    '@traval.clkje4jkvizo.ap-southeast-1.rds.amazonaws.com:3306/traval_orders'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)

print(' [order_consumer] Connecting to exchange...')
hostname = "host.docker.internal"
port = 5672
exchangename = "traval.payments"
connection = pika.BlockingConnection(pika.ConnectionParameters(host=hostname, port=port))
channel = connection.channel()
channel.exchange_declare(exchange=exchangename, exchange_type='topic') # Creates the exchange
channel.queue_declare(queue='order.update_status', durable=True) # Creates the queue
channel.queue_bind(exchange=exchangename, queue='order.update_status', routing_key='order.update_status') # Bind queue to exchange, with the routing key

print(' [order_consumer] Waiting for messages.')


def callback(ch, method, properties, body):
    print(" [order_consumer] Received %s" % body)
    message = json.loads(body)
    print(message) # has payment_intent_id
    order = Order(id=message['order_id'], status=message['status'], user_id=None, datetime=None)
    update_order_status(order)

    ch.basic_ack(delivery_tag=method.delivery_tag)

def update_order_status(order):
    db.session.query(Order).filter_by(id=order.id).update({"status": order.status})

channel.basic_qos(prefetch_count=1)
channel.basic_consume(queue='order.update_status', on_message_callback=callback)
channel.start_consuming()