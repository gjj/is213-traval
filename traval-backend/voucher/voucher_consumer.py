from voucher import Voucher
from dotenv import load_dotenv
import mysql.connector
import requests
import datetime
import pika
import time
import json
import os
import uuid

load_dotenv()

DATABASE_PASSWORD = os.getenv("DATABASE_PASSWORD")
API_URL = os.getenv("API_URL")
hostname = "traval.clkje4jkvizo.ap-southeast-1.rds.amazonaws.com"
port = 3306
db = 'traval_vouchers'
user = 'traval'
password = DATABASE_PASSWORD
db = mysql.connector.connect(host=hostname, port=port, database=db, user=user, password=password)

print(' [voucher_consumer] Connecting to exchange...')
hostname = "host.docker.internal"
port = 5672
exchangename = "traval.payments"
connection = pika.BlockingConnection(pika.ConnectionParameters(host=hostname, port=port))
channel = connection.channel()
channel.exchange_declare(exchange=exchangename, exchange_type='topic') # Creates the exchange
channel.queue_declare(queue='voucher.create_voucher', durable=True)
channel.queue_bind(exchange=exchangename, queue='voucher.create_voucher', routing_key='voucher.create') # make sure the queue is bound to the exchange

print(' [voucher_consumer] Waiting for messages from order.update_status queue.')


def callback(ch, method, properties, body):
    print(" [voucher_consumer] Received %s" % body)
    message = json.loads(body)
    create_voucher(message)

    ch.basic_ack(delivery_tag=method.delivery_tag)

def create_voucher(message):
    try:
        r = requests.get(API_URL + ":5002/orders/" + message["order_id"])
        data = json.loads(r.text)
        time_now = datetime.datetime.now() # Get current timestamp

        # get items[], loop through it, then create a voucher for each order item
        for item in data["items"]:
            guid = str(uuid.uuid4())
            query = "INSERT INTO vouchers(guid, user_id, order_item_id, valid_from, status) VALUES('{}', {}, {}, '{}', '{}')".format(guid, data["user_id"], item["id"], time_now, "Unused")
            cursor = db.cursor()
            cursor.execute(query)
            db.commit()
            cursor.close()

    except error:
        print("Failed to update record: {}".format(error))

channel.basic_qos(prefetch_count=1)
channel.basic_consume(queue='voucher.create_voucher', on_message_callback=callback)
channel.start_consuming()