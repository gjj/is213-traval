from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy

app = Flask(__name__)

app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://traval@traval.clkje4jkvizo.ap-southeast-1.rds.amazonaws.com:3306/traval_catalog'
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
        return {"id": self.id, "title": self.title, "description": self.description, "applicable_date": self.applicable_date, "price": self.price}


@app.route("/catalog-items")
def get_all():
    return jsonify({"catalog-items": [item.json() for item in CatalogItem.query.all()]})


@app.route("/catalog-items/<string:id>")
def find_by_id(id):
    item = CatalogItem.query.filter_by(id=id).first()
    if item:
        return jsonify(item.json())
    return jsonify({"message": "Item not found."}), 404

@app.route("/catalog-items", methods=['POST'])
def create_item():
    if (CatalogItem.query.filter_by(id=id).first()):
        return jsonify({"message": "An item with ID '{}' already exists.".format(id)}), 400
    
    data = request.get_json()
    item = CatalogItem(id, **data)
    
    try:
        db.session.add(item)
        db.session.commit()
    except:
        return jsonify({"message": "An error occurred creating the catalog item."}), 500
    return jsonify(item.json()), 201

if __name__ == '__main__':
    app.run(port=5000, debug=True)
