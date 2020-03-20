from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS

from dotenv import load_dotenv
import os

import uuid

load_dotenv()

DATABASE_PASSWORD = os.getenv("DATABASE_PASSWORD")

app = Flask(__name__)
app.config['JSON_SORT_KEYS'] = False
CORS(app)

app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://traval:' + \
    DATABASE_PASSWORD + '@traval.clkje4jkvizo.ap-southeast-1.rds.amazonaws.com:3306/traval_users'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)


class User(db.Model):
    __tablename__ = 'users'

    id = db.Column(db.Integer, primary_key=True)
    guid = db.Column(db.String(36), nullable=False)
    email = db.Column(db.String(100), nullable=False)
    password = db.Column(db.String(90), nullable=False, unique=True)
    name = db.Column(db.String(90), nullable=False)
    
    phone = db.Column(db.String(15), nullable=False)

    def __init__(self, id, guid, email, password, name, phone):
        self.id = id
        self.guid = guid
        self.email = email
        self.password = password
        self.name = name
        self.phone = phone

    def json(self):
        return {"id": self.id, "guid": self.guid, "email": self.email, "name": self.name, "phone": self.phone}


@app.route("/users")
def get_all():
    return jsonify({"users": [user.json() for user in User.query.all()]})


@app.route("/users/<string:id>")
def find_by_id(id):
    user = User.query.filter_by(id=id).first()
    if user:
        return jsonify(user.json())
    return jsonify({"message": "User not found. (Route matched to <string:id>)"}), 404


@app.route("/users/<string:guid>")
def find_by_guid(guid):
    user = User.query.filter_by(guid=guid).first()
    if user:
        return jsonify(user.json())
    return jsonify({"message": "User not found. (Route matched to <string:guid>)"}), 404


@app.route("/users/email/<string:email>")
def find_by_email(email):
    user = User.query.filter_by(email=email).first()
    if user:
        return jsonify(user.json())
    return jsonify({"message": "User not found. (Route matched to /users/email/<string:email>"}), 404


@app.route("/users/phone/<string:phone>")
def find_by_phone(phone):
    user = User.query.filter_by(phone=phone).first()
    if user:
        return jsonify(user.json())
    return jsonify({"message": "User not found."}), 404


@app.route("/users", methods=['POST'])
def create_item():
    errors = []
    data = request.get_json()

    data.password = ''

    # Validations
    if (User.query.filter_by(id=user.id).filter_by(phone=user.phone).first()):
        errors.append("A user with id '{}' already exists.".format(user.id))
        # return jsonify({"message": "A user with id '{}' already exists.".format(user.id)}), 400

    if (User.query.filter_by(email=user.email).first()):
        errors.append(
            "A user with email '{}' already exists.".format(user.email))
        # return jsonify({"message": "A user with email '{}' already exists.".format(user.email)}), 400

    if (User.query.filter_by(phone=user.phone).first()):
        errors.append(
            "A user with phone '{}' already exists.".format(user.phone))
        # return jsonify({"message": "A user with phone '{}' already exists.".format(user.phone)}), 400

    if len(errors) > 0:
        return jsonify({"message": errors}), 400

    try:
        # make a UUID based on the host ID and current time, since we're not using for crypto, it's ok I guess
        uuid = uuid.uuid1()
        user = User(uuid, **data)
        db.session.add(user)
        db.session.commit()
    except:
        return jsonify({"message": "An error occurred creating the catalog item."}), 500
    return jsonify(user.json()), 201


if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)
