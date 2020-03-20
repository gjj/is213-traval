@extends('partials.master')

@section('title')
Sign in @stop

@section('styles')
@endsection

@section('content')
<main id="content">
    <div class="hero-block hero-v6 bg-img-hero-bottom gradient-overlay-half-blue-gradient z-index-2 mb-6 mb-lg-14 mb-xl-17 pb-xl-2" style="background-image: url(assets/img/1920x750/img1.jpg);">
        <div class="container space-2 space-top-xl-4">
            <div class="justify-content-md-center py-xl-10">

                <div class="mb-lg-n16">
                    <div class="col-md-6 offset-md-3">
                        <div class="card border-0 tab-shadow tab-shadow">
                            <div class="card-body">
                                <h5 class="card-title">Sign in</h5>

                                <form method="post">
                                <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Remember me</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sign in</button>
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
<script type="text/javascript">
    $(document).ready(function() {
        // Handle the registration form
        $('form').on('submit', function(e) {
            e.preventDefault(); // Don't allow it to reload
            
            var data = {
                email: $('#email').val(),
                password: $('#password').val(),
            }
            console.log(JSON.stringify(data));

            var apiUrl = "http://localhost";

            $.ajax({
                method: 'POST',
                url: apiUrl + ':5000/login',
                data: JSON.stringify(data),
                contentType: "application/json; charset=utf-8",
                success: function(result) {
                    sessionStorage.setItem('email', result.email);
                    sessionStorage.setItem('token', result.token);
                    sessionStorage.setItem('name', result.name);
                    
                    console.log(result);
                    window.location.replace(".");
                },
                error: function(error) {
                    console.log(error.responseJSON);
                    window.location.replace("signin#invalid");
                }
            });
        });
    });
</script>
@endsection