from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from dotenv import load_dotenv
import os

load_dotenv()

DATABASE_PASSWORD = os.getenv("DATABASE_PASSWORD")

app = Flask(__name__)

app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://traval:' + DATABASE_PASSWORD + '@traval.clkje4jkvizo.ap-southeast-1.rds.amazonaws.com:3306/traval_users'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)

class User(db.Model):
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


# @app.route("/users")
# def get_all():
#     return jsonify({"users": [user.json() for user in User.query.all()]})


@app.route("/users/<string:id>")
def find_by_id(id):
    user = User.query.filter_by(id=id).first()
    if user:
        return jsonify(user.json())
    return jsonify({"message": "User not found."}), 404

@app.route("/users", methods=['POST'])
def create_item():
    data = request.get_json()
    user = User(data)

    if (User.query.filter_by(email = user.email).first()):
        return jsonify({"message": "A user with email '{}' already exists.".format(email)}), 400

    try:
        db.session.add(user)
        db.session.commit()
    except:
        return jsonify({"message": "An error occurred creating the catalog item."}), 500
    return jsonify(item.json()), 201

if __name__ == '__main__':
    app.run(port=5000, debug=True)
