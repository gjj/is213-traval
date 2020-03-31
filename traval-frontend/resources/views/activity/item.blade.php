@extends('partials.master')

@section('title')
Activity @stop

@section('styles')
@endsection

@section('content')
<div id="activity_item">
</div>
@endsection

@section('scripts')
<script id="tpl_activity_item" type="text/x-jsrender">
    <div class="mb-4 mb-lg-8">
    <img class="img-fluid" src="@{{:photo_urls[0]}}" alt="Image" id="item-image" />
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-xl-9 border-bottom">
            <div class="d-block d-md-flex flex-center-between align-items-start mb-3">
                <div class="mb-1">
                    <div class="mb-2 mb-md-0">
                        <h4 class="font-size-23 font-weight-bold mb-1 mr-3" id="item-title">
                            @{{:title}}
                        </h4>
                    </div>
                    <div class="d-block d-md-flex flex-horizontal-center">
                        <div class="mr-4 mb-2 mb-md-0">
                            <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">
                                @{{if rating}}
                                    @{{:rating}}/5
                                @{{else}}
                                    No ratings
                                @{{/if}}
                            </span>
                            <span class="font-size-14 text-gray-1 ml-2">(@{{:reviews_count}} reviews)</span>
                        </div>
                        <div class="d-block d-md-flex flex-horizontal-center font-size-14 text-gray-1 mb-2 mb-md-0">
                            <i class="icon flaticon-placeholder mr-2 font-size-20"></i>
                            <div id="item-location">Singapore</div>
                            <a href="#" class="ml-1 d-block d-md-inline"> - View on map</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-top pt-4 border-bottom position-relative">
                <h5 class="font-size-21 font-weight-bold text-dark mb-3">
                    Description
                </h5>
                <p id="item-description">
                    @{{:description}}
                </p>
            </div>
            <div class="border-bottom py-4">
                <h5 class="font-size-21 font-weight-bold text-dark mb-4">
                    Location
                </h5>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2586.4155709724932!2d103.85118714755811!3d1.2957954075671003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb9649de50a2e2a51!2sSMU%20Li%20Ka%20Shing%20Library!5e0!3m2!1sen!2ssg!4v1584473010455!5m2!1sen!2ssg" width="100%" height="480" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>

            <div class="border-bottom py-4">
                <h5 class="font-size-21 font-weight-bold text-dark mb-4">
                    Average Reviews
                </h5>
                <div class="row">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="border rounded flex-content-center py-5 border-width-2">
                            <div class="text-center">
                                <h2 class="font-size-50 font-weight-bold text-primary mb-0 text-lh-sm">
                                    @{{if rating}}
                                        @{{:rating}}
                                    @{{else}}
                                        -
                                    @{{/if}}
                                    <span class="font-size-20">/5</span>
                                </h2>
                                <div class="text-gray-1">From @{{:reviews_count}} reviews</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-bottom py-4">
                <h5 class="font-size-21 font-weight-bold text-dark mb-8">
                    @{{if reviews_count}}
                        Showing @{{:reviews_count}} reviews
                    @{{else}}
                        No reviews
                    @{{/if}}
                </h5>
                <div class="media flex-column flex-md-row align-items-center align-items-md-start mb-4">
                    <div class="mr-md-5">
                        <a class="d-block" href="#">
                            <img class="img-fluid mb-3 mb-md-0 rounded-circle" src="assets/img/85x85/img1.jpg" alt="Image-Description">
                        </a>
                    </div>
                    <div class="media-body text-center text-md-left">
                        <div class="mb-4">
                            <h6 class="font-weight-bold text-gray-3">
                                <a href="#">Helena</a>
                            </h6>
                            <div class="font-weight-normal font-size-14 text-gray-9 mb-2">April 25, 2019 at 10:46 am</div>
                            <div class="d-flex align-items-center flex-column flex-md-row mb-2">
                                <button type="button" class="btn btn-xs btn-primary rounded-xs font-size-14 py-1 px-2 mr-2 mb-2 mb-md-0">4.6 /5 </button>
                                <span class="font-weight-bold font-italic text-gray-3">The worst hotel ever ”</span>
                            </div>
                            <p class="text-lh-1dot6 mb-0 pr-lg-5">Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere ultricies tortor imperdiet vitae. Curabitur lacinia neque non metus</p>
                        </div>
                        <div class="review">
                            <div class="row no-gutters justify-content-between align-items-center border border-color-8 border-width-2 rounded-xs p-3 px-md-3 py-md-2 pr-xl-5">
                                <div class="col">
                                    <div class="font-weight-normal font-size-14 text-gray-1 mx-lg-1 my-lg-1 mb-3 mb-md-0">Was This Review...?</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xl-3">
            <div class="mb-4">
                <div class="border border-color-7 rounded mb-5">
                    <div class="border-bottom">
                        <div class="p-4">
                            <span class="font-size-24 text-gray-6 font-weight-bold ml-1">S$@{{:price}}</span>
                        </div>
                    </div>
                    <div class="p-4" id="cart_controls">
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="cart_success">
                            <strong>Yay!</strong> 😃 Item added to your cart! 🛒🛒🛒
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="cart_error">
                            <strong>Whoops!</strong> ☹️ Something went wrong while adding this item to your cart.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <span class="d-block text-gray-1 font-weight-normal mb-2 text-left">Quantity</span>
                        <div class="mb-4">
                            <div class="border-bottom border-width-2 border-color-1 pb-1">
                                <div class="js-quantity flex-center-between mb-1 text-dark font-weight-bold">
                                    <div class="flex-horizontal-center">
                                        <a class="js-minus font-size-10 text-dark" href="javascript:;">
                                            <i class="fas fa-chevron-down"></i>
                                        </a>
                                        <input name="quantity" class="js-result form-control h-auto width-30 font-weight-bold font-size-16 shadow-none bg-tranparent border-0 rounded p-0 mx-1 text-center" type="text" value="1" min="1" max="100">
                                        <a class="js-plus font-size-10 text-dark" href="javascript:;">
                                            <i class="fas fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <a href="javascript:;" id="btn_addToCart" class="btn btn-primary d-flex align-items-center justify-content-center  height-60 w-100 mb-xl-0 mb-lg-1 transition-3d-hover font-weight-bold">
                                Add to Cart 🛒
                            </a>
                        </div>

                        <div class="pb-1"></div>
                        
                        <!-- <div class="text-center">
                            <a href="{{ route('payment.checkout') }}" id="btn_bookNow" class="btn btn-primary d-flex align-items-center justify-content-center  height-60 w-100 mb-xl-0 mb-lg-1 transition-3d-hover font-weight-bold">
                                Book Now
                            </a>
                        </div> -->
                    </div>

                    <div class="p-4" id="sign_in_notice">
                        You're not logged in. Please <a href="/signin">sign in</a> or <a href="/register">register</a> to add to cart!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</script>

<script type="text/javascript">
    $(document).on('ready', function() {
        var activity = {
            user_id: localStorage.getItem('user_id'),
            item_id: $(location).attr('pathname').split('/')[2],
            quantity: 0,
        }

        $.ajax({
            method: 'GET',
            url: apiUrl + "/api/v1/catalog_items/" + activity.item_id,
            success: function(data) {
                var tpl = $.templates('#tpl_activity_item');
                $('#activity_item').append(tpl.render(data));

                // Hide cart controls if not logged in
                if (!localStorage.getItem('token')) {
                    $('#sign_in_notice').show();
                    $('#cart_controls').hide();
                } else {
                    $('#sign_in_notice').hide();
                    $('#cart_controls').show();
                }

                $('#cart_success').hide();
                $('#cart_error').hide();
            }
        });

        $(document).on('click', '#btn_addToCart', function() {
            activity.quantity = $('input[name=quantity]').val();

            if (localStorage.getItem('token')) {
                var userId = localStorage.getItem('user_id');
                console.log(JSON.stringify(activity));

                $.ajax({
                    method: 'POST',
                    url: apiUrl + "/api/v1/orders/cart/update",
                    data: JSON.stringify(activity),
                    contentType: "application/json; charset=utf-8",
                    success: function(response) {
                        console.log("Success.", response);

                        // Update cart UI
                        $.ajax({
                            method: 'GET',
                            url: apiUrl + "/api/v1/orders/cart/" + userId,
                            success: function(response) {
                                $('#cart_success').show();
                                $('#cart_error').hide();
                                $('#cart_items').html("");
                                $('#cart_checkout').html("");
                                var tpl_cart_items = $.templates('#tpl_cart_items');
                                var tpl_cart_checkout = $.templates('#tpl_cart_checkout');

                                $.each(response.items, function(i, item) {
                                    $('#cart_items').append(tpl_cart_items.render(item));
                                });

                                $('#cart_checkout').append(tpl_cart_checkout.render(response));

                                var data = {
                                    "total_price": response.total_price
                                }

                                // And update Payment Intent
                                // updatePaymentIntent(data)
                            },
                            error: function(error) {
                                console.log("Error retrieving cart items.", error);
                            }
                        });
                    },
                    error: function(error) {
                        console.log("Error.", error);
                        $('#cart_success').hide();
                        $('#cart_error').show();
                    }
                });
            } else {
                console.log("You're not logged in.");
            }
        });
    });
</script>
@endsection