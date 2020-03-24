@extends('partials.master')

@section('title')
Register @stop

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.11/css/intlTelInput.css" />
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
                                <h5 class="card-title">Register</h5>

                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="How can we address you as?">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone number</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="My phone number">

                                        <div class="valid-feedback">
                                            <span id="valid-msg">✓ Valid</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <span id="error-msg" class="hide"></span>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Register</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.11/js/intlTelInput.min.js" integrity="sha256-679hprK8vxlf4fnVBENMDhjXffz6MSULSiah9G9FRZg=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var input = document.querySelector("#phone"),
            errorMsg = document.querySelector("#error-msg"),
            validMsg = document.querySelector("#valid-msg");

        // here, the index maps to the error code returned from getValidationError - see readme
        var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

        // initialise plugin
        var iti = window.intlTelInput(input, {
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.11/js/utils.js",
            initialCountry: "sg",
            geoIpLookup: function(callback) {
                $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    callback(countryCode);
                });
            },
        });

        var reset = function() {
            input.classList.remove("error");
            errorMsg.innerHTML = "";
            errorMsg.classList.add("hide");
            validMsg.classList.add("hide");
        };

        // on blur: validate
        input.addEventListener('blur', function() {
            reset();
            if (input.value.trim()) {
                if (iti.isValidNumber()) {
                    validMsg.classList.remove("hide");
                } else {
                    input.classList.add("error");
                    var errorCode = iti.getValidationError();
                    errorMsg.innerHTML = errorMap[errorCode];
                    errorMsg.classList.remove("hide");
                }
            }
        });

        // on keyup / change flag: reset
        input.addEventListener('change', reset);
        input.addEventListener('keyup', reset);

        // Handle the registration form
        $('form').on('submit', function(e) {
            e.preventDefault(); // Don't allow it to reload
            
            var data = {
                name: $('#name').val(),
                email: $('#email').val(),
                password: $('#password').val(),
                phone: iti.getNumber() // Replace unformatted number with formatted number
            }
            console.log(JSON.stringify(data));

            var apiUrl = "http://localhost";

            $.ajax({
                method: 'POST',
                url: apiUrl + ':5000/users',
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