from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy

app = Flask(__name__)

app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://traval@traval.clkje4jkvizo.ap-southeast-1.rds.amazonaws.com:3306/traval_vouchers'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)

class Vouchers(db.Model):
    __tablename__ = 'vouchers'

    id = db.Column(db.Integer, primary_key=True)
    user_id = db.Column(db.Integer, nullable=False)
    order_id = db.Column(db.Integer, nullable=False)
    applicable_date = db.Column(db.Date, nullable=False)
    status = title = db.Column(db.String(8), nullable=False)


    def __init__(id, user_id, order_id, applicable_date, status):
        self.id = id
        self.user_id = user_id
        self.order_id = order_id
        self.applicable_date = applicable_date
        self.status = status

    def json(self):
        return {"id": self.id, "user_id": self.user_id, "order_id": self.order_id, "applicable_date": self.applicable_date, "status": self.status}


@app.route("/voucher")
def get_all_voucher(id):
    all_voucher = Vouchers.query.filter_by(id=id).first()
    if all_voucher:
        return jsonify(all_voucher.json())
    return jsonify({"message":"Voucher not found."}), 404

# @app.route("/voucher", methods=['POST'])
# def create_voucher():
    # data = request.get_json()
    # item = CatalogItem(**data)

    # if (CatalogItem.query.filter_by(id=id).first()):
    #     return jsonify({"message": "A book with isbn13 '{}' already exists.".format(isbn13)}), 400
    
    # try:
    #     db.session.add(item)
    #     db.session.commit()
    # except:
    #     return jsonify({"message": "An error occurred creating the catalog item."}), 500
    # return jsonify(item.json()), 201


# @app.route("/catalog-items")
# def get_all():
#     return jsonify({"catalog-items": [book.json() for book in CatalogItem.query.all()]})


# @app.route("/catalog-items/<string:id>")
# def find_by_id(id):
#     item = CatalogItem.query.filter_by(id=id).first()
#     if item:
#         return jsonify(item.json())
#     return jsonify({"message": "Item not found."}), 404

# @app.route("/catalog-items", methods=['POST'])
# def create_item():
#     data = request.get_json()
#     item = CatalogItem(**data)

    # if (CatalogItem.query.filter_by(id=id).first()):
    #     return jsonify({"message": "A book with isbn13 '{}' already exists.".format(isbn13)}), 400
    
    # try:
    #     db.session.add(item)
    #     db.session.commit()
    # except:
    #     return jsonify({"message": "An error occurred creating the catalog item."}), 500
    # return jsonify(item.json()), 201

if __name__ == '__main__':
    app.run(port=5006, debug=True)
