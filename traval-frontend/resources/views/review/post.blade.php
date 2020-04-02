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
        background-image: url(/assets/img/1920x750/img1.jpg);
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
                                
                                <div class="alert alert-success alert-dismissible fade show" role="alert" id="review_success">
                                    <strong>Yay!</strong>
                                    😃 Your review has been posted. Redirecting you to see your review.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="review_error">
                                    <strong>Whoops!</strong>
                                    ☹️ Something went wrong with your review submission.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="rating">Rating ⭐</label>
                                        <div class="rating" id="rating" name="rating"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="review">Review</label>
                                        <textarea class="form-control" id="review" name="review" rows="5" placeholder="How was your experience?"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="review">Photos of your experience 📷</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="img" name="img" accept="image/*">
                                            <label class="custom-file-label" for="img">Choose file</label>
                                        </div>
                                    </div>

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
    var orderItemId = $(location).attr('pathname').split('/')[3];
    var itemId = 0

    $.ajax({
        method: 'GET',
        url: apiUrl + '/v1/orders/item/' + orderItemId,
        async: false,
        success: function(data) {
            console.log(data);
            itemId = data.item_id;

            $("#activity").text(data.title);
            $(".hero-block").css("background-image", "url(" + data.photo_urls[0] + ")");
        }
    });

    $("#rating").starRating({
        initialRating: 0,
        useFullStars: true,
        strokeColor: '#894A00',
        strokeWidth: 10,
        ratedColor: 'orange',
        starSize: 25,
        disableAfterRate: false,
    });

    $(document).ready(function() {
        $('#review_success').hide();
        $('#review_error').hide();

        $('form').on('submit', function(e) {
            e.preventDefault(); // Don't allow it to reload

            // var data = {
            //     order_item_id: orderItemId,
            //     rating: $('#rating').starRating('getRating'),
            //     review: $('#msg').val()
            // }
            // console.log(JSON.stringify(data));

            var formData = new FormData();
            formData.append('order_item_id', orderItemId);
            formData.append('item_id', itemId)
            formData.append('rating', $('#rating').starRating('getRating'));
            formData.append('review', $('#review').val());
            formData.append('file', $('input[type=file]')[0].files[0]); // Attach file

            console.log($('input[type=file]')[0].files[0]);

            $.ajax({
                crossDomain: true,
                method: 'POST',
                url: apiUrl + '/v1/reviews',
                data: formData,
                contentType: false, //"application/json; charset=utf-8",
                processData: false,
                success: function(result) {
                    console.log(result);
                    $('#review_success').show();
                    $('#review_error').hide();

                    window.location.href = "/activity/" + itemId;
                    // Redirect.
                },
                error: function(error) {
                    console.log(error);
                    $('#review_success').hide();
                    $('#review_error').show();
                }
            });
        });
    });
</script>

@endsection