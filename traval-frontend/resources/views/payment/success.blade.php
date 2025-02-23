@extends('partials.master')

@section('title')
Payment Result @stop

@section('styles')
@endsection

@section('content')
<!-- ========== MAIN CONTENT ========== -->
<main id="content" class="bg-gray space-2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-5 shadow-soft bg-white rounded-sm">
                    <div class="py-6 px-5 border-bottom">
                        <div class="flex-horizontal-center">
                            <div class="height-50 width-50 flex-shrink-0 flex-content-center bg-primary rounded-circle">
                                <i class="flaticon-tick text-white font-size-24"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="font-size-18 font-weight-bold text-dark mb-0 text-lh-sm">
                                    Thank you for choosing us. Your booking order has been confirmed.
                                </h3>
                                <p class="mb-0">
                                    A confirmation email has been sent to your provided email address.
                                    You can check your orders under the Orders tab.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5 border-bottom">
                        <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-2">
                            Booking Information
                        </h5>

                        <ul class="list-unstyled font-size-1 mb-0 font-size-16">
                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">Order number</span>
                                <span class="text-secondary text-right" id="order_id">@{{:id}}</span>
                            </li>

                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">Order date and time</span>
                                <span class="text-secondary text-right" id="order_datetime">@{{:datetime}}</span>
                            </li>

                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">Email address</span>
                                <span class="text-secondary text-right" id="order_email">@{{:email}}</span>
                            </li>

                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">Amount paid</span>
                                <span class="text-secondary text-right" id="order_total_price">S$@{{:total_price}}</span>
                            </li>
                        </ul>
                        
                    </div>
                    <div class="pt-4 pb-5 px-5 border-bottom">
                        <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-3">
                            Payment
                        </h5>
                        <p class="">
                            We've received your payment via Stripe.
                        </p>

                        <!-- <a href="#" class="text-underline text-primary">Payment is made via Stripe</a> -->
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-3">
                            View Order Details
                        </h5>
                        <p class="">
                            You can access them below.
                        </p>

                        <a href="/order" class="text-underline text-primary">
                            Go to My Orders
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@section('scripts')
<script type="text/javascript">
    var urlParams = new URLSearchParams(window.location.search);

    if (!localStorage.getItem('token')) {
        window.location.replace('signin');
    }

    $(document).on('ready', function() {
        if (urlParams.has('order_id')) {
            var orderId = urlParams.get('order_id');

            $.ajax({
                method: 'GET',
                url: apiUrl + '/v1/orders/' + orderId,
                success: function(response) {
                    $('#order_id').text(response.id);
                    $('#order_datetime').text(response.datetime);
                    $('#order_total_price').text("S$" + response.total_price);
                    $('#order_email').text(localStorage.getItem('email'));
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    });
</script>

@endsection