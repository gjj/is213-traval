from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from dotenv import load_dotenv
import os

load_dotenv()

DATABASE_PASSWORD = os.getenv("DATABASE_PASSWORD")

app = Flask(__name__)

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


@app.route("/catalog_items")
def get_all():
    return jsonify({"catalog_items": [item.json() for item in CatalogItem.query.all()]})


@app.route("/catalog_items/<string:id>")
def find_by_id(id):
    item = CatalogItem.query.filter_by(id=id).first()
    if item:
        photos = {"catalog_items_photos": [item_photos.json() for item_photos in CatalogItemPhoto.query.filter_by(item_id=id)]}
        updated_item = item.json()
        updated_item.update(photos)
        return jsonify(updated_item)
    return jsonify({"message": "Item not found."}), 404

@app.route("/catalog_items", methods=['POST'])
def create_item():
    data = request.get_json()
    item = CatalogItem(data)

    if (CatalogItem.query.filter_by(id = item.id).first()):
        return jsonify({"message": "An item with ID '{}' already exists.".format(item.id)}), 400
    
    try:
        db.session.add(item)
        db.session.commit()
    except:
        return jsonify({"message": "An error occurred creating the catalog item."}), 500
    return jsonify(item.json()), 201

if __name__ == '__main__':
    app.run(port=5000, debug=True)
