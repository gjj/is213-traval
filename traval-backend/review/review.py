from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from dotenv import load_dotenv
import os

load_dotenv()

DATABASE_PASSWORD = os.getenv("DATABASE_PASSWORD")

app = Flask(__name__)

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
    message = db.Column(db.String(800), nullable=False)
    status = db.Column(db.String(8), nullable=False)

    def __init__(self, id, title, description, price):
        self.id = id
        self.user_id = user_id
        self.order_id = order_id
        self.datetime = datetime
        self.rating = rating
        self.message = message
        self.status = status

    def json(self):
        return {"id": self.id, "user_id": self.user_id, "order_id": self.order_id, "datetime": self.datetime, "rating": self.rating, "message": self.message, "status": self.status}

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

# will need to call order class
@app.route("/catalog_items/<string:item_id>/reviews")
def get_by_item(item_id):
    all_reviews = {"reviews": [review.json() for review in Review.query.filter_by(order_id=order_id).all()]}
    for review_dict in all_reviews["reviews"]:
        id = review_dict["id"]
        review = Review.query.filter_by(id=id).first()
        if review:
            photos = get_photos(review, id)
            review_dict.update(photos)               
    return jsonify(all_reviews)


@app.route("/catalog_items/<string:order_id>/reviews", methods=['POST'])
def create_review():
    data = request.get_json()
    review = Review(**data)
    if (Review.query.filter_by(filter_by(id = review.id).first()):
        return jsonify({"message": "A review with id '{}' already exists.".format(user.id)}), 400
    if (Review.query.filter_by(order_id = review.order_id).first()):
        return jsonify({"message": "A review already exists for this order."}), 400
    try:
        db.session.add(review)
        db.session.commit()
    except:
        return jsonify({"message": "An error occurred creating the catalog review."}), 500
    return jsonify(review.json()), 201


if __name__ == '__main__':
    app.run(port=5003, debug=True)
