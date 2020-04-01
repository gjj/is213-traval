const accountSid        = process.env.TWILIO_ACCOUNT_SID;
const authToken         = process.env.TWILIO_AUTH_TOKEN;
const twilioPhoneNumber = process.env.TWILIO_PHONE_NUMBER;

var amqp    = require('amqplib/callback_api');
var util    = require('util');
var dotenv  = require('dotenv').config();
var mailgun = require('mailgun-js')({apiKey: process.env.MAILGUN_API_KEY, domain: process.env.MAILGUN_DOMAIN});
var twilio  = require('twilio')(accountSid, authToken);

amqp.connect('amqp://localhost', function(error0, connection) {
    if (error0) {
        throw error0;
    }

    // notification.notify
    connection.createChannel(function(error1, channel) {
        if (error1) {
            throw error1;
        }

        var queue = 'notification.notify';
        channel.assertQueue(queue, {
            durable: true
        });

        console.log(" [notifications] Waiting for messages in %s. To exit press CTRL+C", queue);

        channel.consume(queue, function(msg) {
            console.log(" [notifications] Received %s", msg.content.toString());

            var message = JSON.parse(msg.content.toString());
            var twilio_text = "";
            var mg_title    = "";
            var mg_body     = "";

            if (message.message_type == "payment_success") {
                twilio_text = util.format("[Traval] Your Order #%s is now confirmed. You'll be receiving your vouchers shortly.", message.order_id);
                mg_title = util.format("[Traval] 💳 Order summary #%s", message.order_id);
                mg_body = "Your order has been confirmed.";
            }

            if (message.message_type == "voucher_created") {
                twilio_text = util.format('[Traval] Your voucher for Order #%s has been issued.', message.order_id);
                mg_title = "[Traval] 🏕 Vouchers confirmed - time to go on an adventure!";
                mg_body = "Your voucher has been issued.";
            }
            
            // SMS
            twilio.messages
                .create({
                    body: util.format("[Traval] Your Order #%s is now confirmed. You'll be receiving your vouchers shortly.", message.order_id),
                    from: twilioPhoneNumber,
                    to: message.phone_number
                })
                .then(sms =>
                    console.log(' [notifications] SMS for event %s and order ID %s sent to %s (Twilio SMS ID %s)', message.message_type, message.order_id, message.phone_number, sms.sid)
                );

            // Email
            const data = {
                from: 'The Traval App <hello@traval.app>',
                to: message.email,
                subject: mg_title,
                text: mg_body
            };
            
            mailgun.messages().send(data, (error, body) => {
                console.log(body);
            });
        }, {
            noAck: true
        });
    });
});
