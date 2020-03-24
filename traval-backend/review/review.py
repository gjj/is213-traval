from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS
import datetime
import json

from dotenv import load_dotenv
import os

import requests

load_dotenv()

DATABASE_PASSWORD = os.getenv("DATABASE_PASSWORD")
API_URL = os.getenv("API_URL")
travel_order_url = API_URL + ":5002/orders"

app = Flask(__name__)
app.config['JSON_SORT_KEYS'] = False
CORS(app)

app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://traval:' + DATABASE_PASSWORD + '@traval.clkje4jkvizo.ap-southeast-1.rds.amazonaws.com:3306/traval_reviews'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)

class Review(db.Model):
    __tablename__ = 'reviews'

    id = db.Column(db.Integer, primary_key=True)
    user_id = db.Column(db.Integer, nullable=False)
    order_id = db.Column(db.Integer, nullable=False)
    datetime = db.Column(db.DateTime, nullable=False)
    rating = db.Column(db.Integer, nullable=False)
    msg = db.Column(db.String(800), nullable=True)
    status = db.Column(db.String(8), nullable=False)

    def __init__(self, id, user_id, order_id, datetime, rating, msg, status):
        self.id = id
        self.user_id = user_id
        self.order_id = order_id
        self.datetime = datetime
        self.rating = rating
        self.msg = msg
        self.status = status
    
    def json(self):
        return {"id": self.id, "user_id": self.user_id, "order_id": self.order_id, "datetime": self.datetime, "rating": self.rating, "msg": self.msg, "status": self.status}

class ReviewPhoto(db.Model):
    __tablename__ = 'review_photos'

    id = db.Column(db.Integer, primary_key=True)
    review_id = db.Column(db.Integer, nullable=False)
    photo_url = db.Column(db.String(100), nullable=False)

    def __init__(self, id, review_id, photo_url):
        self.id = id
        self.review_id = review_id
        self.photo_url = photo_url
        
    def json(self):
        return {"id": self.id, "review_id": self.review_id, "photo_url": self.photo_url}


def get_photos(review, id):
    if review:
        retrieved_photos = [review_photos.json() for review_photos in ReviewPhoto.query.filter_by(review_id=id)]
        photos = {
            "photo_urls": [photo["photo_url"] for photo in retrieved_photos]
        }
        return photos


@app.route("/reviews")
def get_all():
    all_reviews = {"reviews": [review.json() for review in Review.query.all()]}
    for review_dict in all_reviews["reviews"]:
        id = review_dict["id"]
        review = Review.query.filter_by(id=id).first()
        if review:
            photos = get_photos(review, id)
            review_dict.update(photos)               
    return jsonify(all_reviews)


@app.route("/catalog_items/<string:order_id>/reviews")
def get_by_order(order_id):
    all_reviews = {"reviews": [review.json() for review in Review.query.filter_by(order_id=order_id).all()]}
    for review_dict in all_reviews["reviews"]:
        id = review_dict["id"]
        review = Review.query.filter_by(id=id).first()
        if review:
            photos = get_photos(review, id)
            review_dict.update(photos)               
    return jsonify(all_reviews)


@app.route("/reviews", methods=['POST'])
def create_review():
    data = request.get_json()

    r = requests.get(travel_order_url + "/" + str(data["order_id"]) + "/user")
    user_id = json.loads(r.text)["user_id"]

    if (Review.query.filter_by(user_id = user_id).filter_by(order_id = data["order_id"]).first()):
        return jsonify({"message": "You have already placed a review for this order."}), 400

    review = Review(None, user_id, data["order_id"], None, int(float(data["rating"])), data["msg"], "Success")

    try:
        db.session.add(review)
        db.session.commit()
    except:
        return jsonify({"message": "An error occurred creating the review."}), 500
    
    if "photo_urls" in data:
        photos = data["photo_urls"]
        if type(photos)==list and len(photos)>0:  #non-empty li
            for i in range(len(photos)):
                photo = ReviewPhoto(None, data["id"], photos[i])   # photo id (i+1), review id, photo url
                try: 
                    db.session.add(photo)
                    db.session.commit()
                except:
                    if len(photos)==1:     # 1 url
                        return jsonify({"message": "An error occurred uploading the review photo."}), 500        
                    else:                  # >1 url
                        return jsonify({"message": "An error occurred uploading a review photo."}), 500            
        # elif type(photos)==str and len(photos)>0: #non-empty str
        #     try: 
        #         db.session.add(photos)
        #         db.session.commit()
        #     except:
        #         return jsonify({"message": "An error occurred uploading the review photo."}), 500 
       
    return data, 201


if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5005, debug=True)
