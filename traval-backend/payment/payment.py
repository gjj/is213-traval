from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy

app = Flask(__name__)

app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://traval@traval.clkje4jkvizo.ap-southeast-1.rds.amazonaws.com:3306/traval_payments'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)

class Payment(db.Model):
    __tablename__ = 'payments'

    id = db.Column(db.Integer, primary_key=True)
    user_id = db.Column(db.Integer, nullable=False)
    order_id = db.Column(db.Integer, nullable=False)
    price = db.Column(db.Float(precision=2), nullable=False)
    status = title = db.Column(db.String(10), nullable=False)


    def __init__(id, user_id, order_id, price, status):
        self.id = id
        self.user_id = user_id
        self.order_id = order_id
        self.price = price
        self.status = status

    def json(self):
        return {"id": self.id, "user_id": self.user_id, "order_id": self.order_id, "price": self.price, "status": self.status}


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
    app.run(port=5002, debug=True)
