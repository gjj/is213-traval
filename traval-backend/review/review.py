from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS
from werkzeug.utils import secure_filename
from dotenv import load_dotenv
import boto3
import datetime
import json
import os
import requests
import mimetypes


load_dotenv()

API_URL = os.getenv("API_URL")
DATABASE_PASSWORD = os.getenv("DATABASE_PASSWORD")
AWS_ACCESS_KEY_ID = os.getenv("AWS_ACCESS_KEY_ID")
AWS_SECRET_ACCESS_KEY = os.getenv("AWS_SECRET_ACCESS_KEY")
AWS_BUCKET_NAME = 'traval-reviews'
AWS_CLOUDFRONT_URL = 'https://dkddp8unwuero.cloudfront.net/'

PHOTOS_UPLOAD_FOLDER = '/tmp/traval-reviews/photos'
PHOTOS_ALLOWED_EXTENSIONS = set(['png', 'jpg', 'jpeg', 'gif', 'webp'])

app = Flask(__name__)
app.config['JSON_SORT_KEYS'] = False
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://traval:' + DATABASE_PASSWORD + '@traval.clkje4jkvizo.ap-southeast-1.rds.amazonaws.com:3306/traval_reviews'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
app.config['UPLOAD_FOLDER'] = PHOTOS_UPLOAD_FOLDER

client = boto3.client(
    's3',
    aws_access_key_id=AWS_ACCESS_KEY_ID,
    aws_secret_access_key=AWS_SECRET_ACCESS_KEY
)

CORS(app)
db = SQLAlchemy(app)

travel_order_url = API_URL + ":5002/orders"

class Review(db.Model):
    __tablename__ = 'reviews'

    id = db.Column(db.Integer, primary_key=True)
    user_id = db.Column(db.Integer, nullable=False)
    item_id = db.Column(db.Integer, nullable=False)
    order_item_id = db.Column(db.Integer, nullable=False)
    datetime = db.Column(db.DateTime, nullable=False)
    rating = db.Column(db.Integer, nullable=False)
    review = db.Column(db.String(800), nullable=True)
    status = db.Column(db.String(8), nullable=False)

    def __init__(self, id, user_id, item_id, order_item_id, datetime, rating, review, status):
        self.id = id
        self.user_id = user_id
        self.item_id = item_id
        self.order_item_id = order_item_id
        self.datetime = datetime
        self.rating = rating
        self.review = review
        self.status = status
    
    def json(self):
        return {"id": self.id, "user_id": self.user_id, "item_id": self.item_id, "order_item_id": self.order_item_id, "datetime": self.datetime, "rating": self.rating, "review": self.review, "status": self.status}

class ReviewPhoto(db.Model):
    __tablename__ = 'review_photos'

    id = db.Column(db.Integer, primary_key=True)
    review_id = db.Column(db.Integer, nullable=False)
    photo_url = db.Column(db.String(100), nullable=False)

    def __init__(self, id, review_id, photo_url):
        self.id = id
        self.review_id = review_id
        self.photo_url = photo_url
        
    def json(self):
        return {"id": self.id, "review_id": self.review_id, "photo_url": self.photo_url}

# Helper functions
def allowed_file(filename):
    return '.' in filename and \
           filename.rsplit('.', 1)[1].lower() in PHOTOS_ALLOWED_EXTENSIONS

def get_photos(review, id):
    if review:
        retrieved_photos = [review_photos.json() for review_photos in ReviewPhoto.query.filter_by(review_id=id)]
        photos = {
            "photo_urls": [photo["photo_url"] for photo in retrieved_photos]
        }
        return photos

# GET /reviews
# Get all reviews, like literally everything
@app.route("/reviews")
def get_all_reviews():
    all_reviews = {"reviews": [review.json() for review in Review.query.all()]}
    for review_dict in all_reviews["reviews"]:
        id = review_dict["id"]
        review = Review.query.filter_by(id=id).first()
        if review:
            photos = get_photos(review, id)
            review_dict.update(photos)               
    return jsonify(all_reviews)

# GET /reviews/<string:catalog_item_id>
# Get reviews by catalog item ID
@app.route("/reviews/<string:catalog_item_id>")
def get_by_order(catalog_item_id):
    reviews = {
        "reviews": [review.json() for review in Review.query.filter_by(item_id=catalog_item_id).order_by(Review.datetime.desc()).all()]
    }

    sum_rating = 0
    for review_dict in reviews["reviews"]:
        id = review_dict["id"]
        review = Review.query.filter_by(id=id).first()
        sum_rating += float(review_dict["rating"])

        if review:
            photos = get_photos(review, id)
            review_dict.update(photos)
            
    n = len(reviews["reviews"])

    if n == 0:
        avg_rating = 0 # Prevent division by zero error
    else:
        avg_rating = sum_rating / n

    reviews.update({"avg_rating": avg_rating})
    reviews.update({"number_of_reviews": n})

    # calc avg rating
    return jsonify(reviews)

# POST /reviews
# Create new review, with review photo upload as well
@app.route("/reviews", methods=['POST'])
def create_review():
    data = request.form

    # Get the entire order details using the order item ID
    r = requests.get(travel_order_url + "/item/" + str(data["order_item_id"]) + "/all")
    user_id = json.loads(r.text)["user_id"]

    # Get the specific order item to get the item ID
    r = requests.get(travel_order_url + "/item/" + str(data["order_item_id"]))
    item_id = json.loads(r.text)["item_id"]

    if (Review.query.filter_by(user_id=user_id).filter_by(order_item_id=data["order_item_id"]).first()):
        return jsonify({"message": "You have already placed a review for this order."}), 400

    time_now = datetime.datetime.now() # Get current timestamp

    review = Review(None, user_id, item_id, data["order_item_id"], time_now, int(float(data["rating"])), data["review"], "Success")

    # try:
    db.session.add(review)
    db.session.commit()

    if 'file' in request.files:
        file = request.files['file']

        if file.filename != '' and allowed_file(file.filename):
            filename = secure_filename(file.filename)
            filelocation = os.path.join(app.config['UPLOAD_FOLDER'], filename) # change filename
            file.save(filelocation)

            # Upload to S3
            s3 = boto3.resource('s3')
            # with open(filelocation, "rb") as f:

            renamed_filename = "photos/review-pic-" + str(review.order_item_id) + "-" + filename
            file_mime = mimetypes.guess_type(filelocation)[0] or 'binary/octet-stream'
            s3.meta.client.upload_file(filelocation, AWS_BUCKET_NAME, renamed_filename, ExtraArgs={'ContentType': file_mime})
            
            photo = ReviewPhoto(None, review.id, AWS_CLOUDFRONT_URL + renamed_filename) # photo ID is auto incremented, review id, photo url
            db.session.add(photo)
            db.session.commit()
            
    # except:
    #     return jsonify({"message": "An error occurred creating the review."}), 500
    
    # if "photo_urls" in data:
    #     photos = data["photo_urls"]
    #     if type(photos)==list and len(photos)>0:  #non-empty li
    #         for i in range(len(photos)):
    #             photo = ReviewPhoto(None, data["id"], photos[i])   # photo id (i+1), review id, photo url
    #             try: 
    #                 db.session.add(photo)
    #                 db.session.commit()
    #             except:
    #                 if len(photos)==1:     # 1 url
    #                     return jsonify({"message": "An error occurred uploading the review photo."}), 500        
    #                 else:                  # >1 url
    #                     return jsonify({"message": "An error occurred uploading a review photo."}), 500            
        # elif type(photos)==str and len(photos)>0: #non-empty str
        #     try: 
        #         db.session.add(photos)
        #         db.session.commit()
        #     except:
        #         return jsonify({"message": "An error occurred uploading the review photo."}), 500 
       
    return data, 201


if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5005, debug=True)
