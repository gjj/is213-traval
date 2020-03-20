from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS

from dotenv import load_dotenv
import os

load_dotenv()

DATABASE_PASSWORD = os.getenv("DATABASE_PASSWORD")

app = Flask(__name__)
app.config['JSON_SORT_KEYS'] = False
CORS(app)

app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://traval:' + DATABASE_PASSWORD + '@traval.clkje4jkvizo.ap-southeast-1.rds.amazonaws.com:3306/traval_catalog'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)

class CatalogItem(db.Model):
    __tablename__ = 'catalog_items'

    id = db.Column(db.Integer, primary_key=True)
    title = db.Column(db.String(80), nullable=False)
    description = db.Column(db.String(1000), nullable=False)
    price = db.Column(db.Float(precision=2), nullable=False)

    def __init__(self, id, title, description, price):
        self.id = id
        self.title = title
        self.description = description
        self.price = price

    def json(self):
        return {"id": self.id, "title": self.title, "description": self.description, "price": self.price}

class CatalogItemPhoto(db.Model):
    __tablename__ = 'catalog_photos'

    id = db.Column(db.Integer, primary_key=True)
    item_id = db.Column(db.Integer, nullable=False)
    photo_url = db.Column(db.String(100), nullable=False)

    def __init__(self, id, item_id, photo_url):
        self.id = id
        self.item_id = item_id
        self.photo_url = photo_url
    def json(self):
        return {"id": self.id, "item_id": self.item_id, "photo_url": self.photo_url}


def get_photos(item, id):
    if item:
        retrieved_photos = [item_photos.json() for item_photos in CatalogItemPhoto.query.filter_by(item_id=id)]
        photos = {
            "photo_urls": [photo["photo_url"] for photo in retrieved_photos]
        }
        return photos


@app.route("/catalog_items")
def get_all():
    all_items = {"catalog_items": [item.json() for item in CatalogItem.query.all()]}
    for item_dict in all_items["catalog_items"]:
        id = item_dict["id"]
        item = CatalogItem.query.filter_by(id=id).first()
        if item:
            photos = get_photos(item, id)
            item_dict.update(photos)               
    return jsonify(all_items)


@app.route("/catalog_items/<string:id>")
def find_by_id(id):
    item = CatalogItem.query.filter_by(id=id).first()
    
    if item:
        photos = get_photos(item, id)
        updated_item = item.json()
        updated_item.update(photos)
        return jsonify(updated_item)
    
    return jsonify({"message": "Item not found."}), 404


@app.route("/catalog_items", methods=['POST'])
def create_item():
    data = request.get_json()
    item = CatalogItem(**data)
    if (CatalogItem.query.filter_by(id = item.id).first()):
        return jsonify({"message": "An item with ID '{}' already exists.".format(item.id)}), 400
    
    try:
        db.session.add(item)
        db.session.commit()
    except:
        return jsonify({"message": "An error occurred creating the catalog item."}), 500
    
    return jsonify(item.json()), 201

@app.route("/catalog_photos", methods=['POST'])
def create_photo():
    data = request.get_json()
    photo = CatalogItemPhoto(**data)

    if (CatalogItemPhoto.query.filter_by(id = photo.id).first()):
        return jsonify({"message": "A photo with id '{}' already exists.".format(photo.id)}), 400
    if (CatalogItemPhoto.query.filter_by(item_id = photo.item_id).filter_by(photo_url = photo.photo_url).first()):
        return jsonify({"message": "A photo with url '{}' already exists for this item.".format(photo.photo_url)}), 400
    
    try:
        db.session.add(item)
        db.session.commit()
    except:
        return jsonify({"message": "An error occurred creating the catalog item."}), 500
    
    return jsonify(item.json()), 201

@app.route("/catalog_items/search/<string:q>")
def search(q):
    q = "%{}%".format(q) # Wildcard search
    result = {"catalog_items": [item.json() for item in CatalogItem.query.filter(CatalogItem.title.like(q)).all()]}
    result.update({"count": len(result["catalog_items"])}) # Add search result count to the list above

    # Fetch photo URLs
    for item_dict in result["catalog_items"]:
        id = item_dict["id"]
        item = CatalogItem.query.filter_by(id=id).first()
        if item:
            photos = get_photos(item, id)
            item_dict.update(photos)               
    return jsonify(result)


# will need to call order class
@app.route("/catalog_items/<string:id>/reviews")
def get_item_reviews(id):
        item = CatalogItem.query.filter_by(id=id).first()
        if not item:
            return jsonify({"message":"Order not found."}), 404
        item_id = str(order_item.item_id)

        orders_by_item_id = {"order": [order.json() for order in Orders.query.filter_by(item_id=item_id).all()]}
        order_ids = []
        for order in orders_by_item_id:
            order_ids.append(json.loads(order.text)["id"])

    # all_reviews = {"reviews": [review.json() for review in Review.query.filter_by(order_id=order_id).all()]}
    # for review_dict in all_reviews["reviews"]:
    #     id = review_dict["id"]
    #     review = Review.query.filter_by(id=id).first()
    #     if review:
    #         photos = get_photos(review, id)
    #         review_dict.update(photos)               
    # return jsonify(all_reviews)
    # return jsonify(order_ids)



if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5001, debug=True)
