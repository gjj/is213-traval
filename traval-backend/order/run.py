from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy

app = Flask(__name__)

app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://traval@traval.clkje4jkvizo.ap-southeast-1.rds.amazonaws.com:3306/traval_catalog'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)

class CatalogItem(db.Model):
    __tablename__ = 'catalog_items'

    isbn13 = db.Column(db.String(13), primary_key=True)
    title = db.Column(db.String(64), nullable=False)
    price = db.Column(db.Float(precision=2), nullable=False)
    availability = db.Column(db.Integer)

    def __init__(self, isbn13, title, price, availability):
        self.isbn13 = isbn13
        self.title = title
        self.price = price
        self.availability = availability

    def json(self):
        return {"isbn13": self.isbn13, "title": self.title, "price": self.price, "availability": self.availability}


@app.route("/catalog-items")
def get_all():
    return jsonify({"catalog-items": [book.json() for book in CatalogItem.query.all()]})


@app.route("/catalog-items/<string:id>")
def find_by_id(id):
    item = CatalogItem.query.filter_by(id=id).first()
    if item:
        return jsonify(item.json())
    return jsonify({"message": "Item not found."}), 404

@app.route("/catalog-items", methods=['POST'])
def create_item():
    data = request.get_json()
    item = CatalogItem(**data)

    # if (CatalogItem.query.filter_by(id=id).first()):
    #     return jsonify({"message": "A book with isbn13 '{}' already exists.".format(isbn13)}), 400
    
    try:
        db.session.add(item)
        db.session.commit()
    except:
        return jsonify({"message": "An error occurred creating the catalog item."}), 500
    return jsonify(item.json()), 201

if __name__ == '__main__':
    app.run(port=5000, debug=True)
