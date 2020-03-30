@extends('partials.master')

@section('title')
Leave Review @stop

@section('styles')
<link rel="stylesheet" type="text/css" href="plugins/star-rating-svg.css">

<style>
    /* Override dispaly: inline-block; */
    .iti {
        position: relative;
        display: block;
    }

    .hide {
        display: none;
    }

    .hero-block {
        background-image: url(assets/img/1920x750/img1.jpg);
    }

</style>
@endsection

@section('content')
<main id="content">
    <div class="hero-block img-fluid hero-v6 bg-img-hero-bottom gradient-overlay-half-blue-gradient z-index-2 mb-6 mb-lg-14 mb-xl-17 pb-xl-2">
        <div class="container">
            <div class="justify-content-md-center py-xl-10">

                <div class="mb-lg-n16">
                    <div class="col-md-6 offset-md-3">
                        <div class="card border-0 tab-shadow tab-shadow">
                            <div class="card-body">
                                <h5 class="card-title">Review for <span id="activity">@{{activity}}</span></h5>

                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="rating">Rating</label>  <br>
                                        <div class="rating" id="rating" name="rating" ></div>
                                    </div>  <br>
                                    
                                    <div class="form-group">
                                        <label for="msg">Review</label>
                                        <textarea class="form-control" id="msg" name="msg" rows="5" placeholder="How was your experience?"></textarea>
                                    </div>  <br>

                                    <div class="form-group">
                                        <input type="file" id="img" name="img" accept="image/*">
                                    </div>  <br>
                                    
                                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')
<script src="plugins/jquery.star-rating-svg.js"></script>

<script type="text/javascript">

    var apiUrl = "http://localhost";
    orderid = {{ Request()->order_item_id }};

    $.ajax({
        method: 'GET',
        url: apiUrl + ':8000/api/v1/orders/dets/' + orderid,
        async: false,
        success: function(data) {
            console.log(data)
            $("#activity").text(data.title);
            $(".hero-block").css("background-image", "url("+data.photo+")");
        }
    });

    $("#rating").starRating({
        initialRating: 4,
        useFullStars: true,
        strokeColor: '#894A00',
        strokeWidth: 10,
        ratedColor:'orange',
        starSize: 25,
        disableAfterRate: false,
    });
    
    $(document).ready(function() {

        $('form').on('submit', function(e) {
            e.preventDefault(); // Don't allow it to reload
         
            var data = {
                order_id: orderid,
                rating: $('#rating').starRating('getRating'),
                msg: $('#msg').val()
            }
            console.log(JSON.stringify(data));

            $.ajax({
                crossDomain: true,
                method: 'POST',
                url: apiUrl + ':8000/api/v1/reviews',
                data: JSON.stringify(data),
                contentType: "application/json; charset=utf-8",
                success: function(result) {
                    console.log(result);
                    
                    // Redirect.
                },
                error: function(error) {
                    console.log(error.responseJSON);
                }
            });
        });
    });
</script>

@endsection