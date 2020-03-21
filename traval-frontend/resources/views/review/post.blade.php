@extends('partials.master')

@section('title')
Register @stop

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
</style>
@endsection

@section('content')
<main id="content">
    <div class="hero-block hero-v6 bg-img-hero-bottom gradient-overlay-half-blue-gradient z-index-2 mb-6 mb-lg-14 mb-xl-17 pb-xl-2" style="background-image: url(assets/img/1920x750/img1.jpg);">
        <div class="container">
            <div class="justify-content-md-center py-xl-10">

                <div class="mb-lg-n16">
                    <div class="col-md-6 offset-md-3">
                        <div class="card border-0 tab-shadow tab-shadow">
                            <div class="card-body">
                                <h5 class="card-title">Leave Review</h5>

                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="rating">Rating</label>  <br>
                                        <div class="rating" id="rating" name="rating" ></div>
                                    </div>  <br>
                                    
                                    <div class="form-group">
                                        <label for="msg">Review</label>
                                        <textarea class="form-control" id="msg" name="msg" rows="5" placeholder="How was your experience?"></textarea>
                                    </div>  <br>
                                    
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
    $(document).ready(function() {
 
        $("#rating").starRating({
            initialRating: 4,
            strokeColor: '#894A00',
            strokeWidth: 10,
            ratedColor:'orange',
            starSize: 25,
            disableAfterRate: false,
        });

        $('form').on('submit', function(e) {
            e.preventDefault(); // Don't allow it to reload
            
            var rate = $('#rating').starRating('getRating');

            var data = {
                rating: rate,
                msg: $('#msg').val()
            }
            console.log(JSON.stringify(data));

            var apiUrl = "http://localhost";

            $.ajax({
                method: 'POST',
                url: apiUrl + ':5003/reviews',
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