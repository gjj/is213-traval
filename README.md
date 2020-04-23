# The Traval App ✈️🗺️
The world 🌎 is yours to explore!

## Prerequisites

Please make sure your WAMP and RabbitMQ is not running (i.e. ports 80, 443, 5672 and 15672 should be free).

## 1. Setup Instructions

If you are running Windows, double click on the `docker-traval-start.bat` file.

If you are running Mac, you can copy paste the following commands and run it in shell. Please make sure to change directory to the `traval` folder first!

```
cd ./traval-backend
docker-compose -f docker-compose.yml -f docker-compose.prod.yml up -d
cd ../traval-frontend
docker-compose -f docker-compose.yml -f docker-compose.prod.yml up -d
```

## 2. The Traval App (User)

### Accessing the App

Now, you should be able to access http://localhost/. We also enabled HTTPS as the Merchant side uses WebRTC API to access your physical device camera, which requires HTTPS. You do not need to use HTTPS for the User side, although you can do so at https://localhost/ and you need to accept the self-signed certificate warning.

### Register or Signin

If you cannot see the Register or Signin button, please zoom out. For registration, after registering at http://localhost/register, it doesn't redirect you (since it wasn't part of our flow, we didn't spend too much time on it), but you should be able to sign in at http://localhost/signin.

Do note that some features may not be available to test as we're unable to provide a static `ngrok.io` localhost tunnelling URL without paying for the pro subscription.

- If you'd like to verify our Stripe Webhook, just hit us up and we'll show it via Zoom or something. Reason is because we have to specify a domain in Stripe's webhook panel, but the free ngrok.com app will keep changing the URL. :(
- Alternatively, you may choose to use your own Stripe API credentials by going to `/traval-backend/payment/.env` and replace the API keys in the environment file, then do a `ngrok http 8000` to get the `ngrok.io` URL, then add the Webhook endpoint in your own Stripe dashboard [here](https://dashboard.stripe.com/test/webhooks) with the URL `http://<random_hash>.ngrok.io:8000/v1/payment/stripe/webhook`.
- Since you may not be able to demo the Stripe Webhook feature, it will be difficult to test the remaining of the payment flow.
- You can also check our source code at `/traval-backend/payment/payment.py` for the Webhook, `/traval-backend/order/order_consumer.py`, `/traval-backend/voucher/voucher_consumer.py` for the RabbitMQ consumers and `/traval-backend/notification/app.js` for the Notifications microservice

## 3. The Traval App (Merchant)

To try out the merchant QR code scanner without logging in, just go to https://localhost/merchant/scan - it must be on HTTPS because WebRTC only works over HTTPS. Otherwise, you won't be able to use the camera scan feature. Instead, you can upload a picture of a QR code to work.

If you want to try this feature out on your phone, you need to find out the IP address of your computer/laptop running our Docker images, then access it on your phone as e.g. `https://192.168.0.8/merchant/scan`. Again, you must accept the self-signed certificate warning.


## 4. Tear Down

If you are running Windows, double click on the `docker-traval-stop.bat` file.

If you are running Mac, you can copy paste the following commands and run it in shell. Please make sure to change directory to the `traval` folder first!

```
cd ./traval-backend
docker-compose -f docker-compose.yml -f docker-compose.prod.yml down
cd ../traval-frontend
docker-compose -f docker-compose.yml -f docker-compose.prod.yml down
```
