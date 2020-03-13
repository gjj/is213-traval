from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy

app = Flask(__name__)

app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://traval@traval.clkje4jkvizo.ap-southeast-1.rds.amazonaws.com:3306/traval_users'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)

class Users(db.Model):
    __tablename__ = 'users'

    id = db.Column(db.Integer, primary_key=True)
    password = db.Column(db.String(90), nullable=False)
    name = db.Column(db.String(90), nullable=False)
    email = db.Column(db.String(180), nullable=False)
    phone = db.Column(db.String(15), nullable=False)


    def __init__(self, id, password, name, email, phone):
        self.id = id
        self.password = password
        self.name = name
        self.email = email
        self.phone = phone

    def json(self):
        return {"id": self.id, "password": self.password, "name": self.name, "email": self.email, "phone": self.phone}


# @app.route("/catalog-items")
# def get_all():
#     return jsonify({"catalog-items": [book.json() for book in CatalogItem.query.all()]})


@app.route("/user/<int:id>")
def find_by_id(id):
    item = Users.query.filter_by(id=id).first()
    if item:
        return jsonify(item.json())
    return jsonify({"message": "Item not found."}), 404

@app.route("/user", methods=['POST'])
def create_item():
    if (Users.query.filter_by(email=email).first()):
        return jsonify({"message": "A user with email '{}' already exists.".format(email)}), 400
    
    data = request.get_json()
    user = Users(email,**data)

    try:
        db.session.add(user)
        db.session.commit()
    except:
        return jsonify({"message": "An error occurred creating the catalog item."}), 500
    return jsonify(item.json()), 201

if __name__ == '__main__':
    app.run(port=5000, debug=True)
