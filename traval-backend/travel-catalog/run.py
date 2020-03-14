from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy

import catalog_item

app = Flask(__name__)

app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://traval@traval.clkje4jkvizo.ap-southeast-1.rds.amazonaws.com:3306/traval_catalog'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)

if __name__ == '__main__':
    app.run(port=5000, debug=True)
