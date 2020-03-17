@extends('partials.master-home')

@section('title')
Home @stop

@section('styles')
@endsection

@section('content')
<main id="content">
    <div class="hero-block hero-v6 bg-img-hero-bottom gradient-overlay-half-blue-gradient text-center z-index-2 mb-6 mb-lg-14 mb-xl-17 pb-xl-2" style="background-image: url(assets/img/1920x750/img1.jpg);">
        <div class="container space-2 space-top-xl-6">
            <div class="justify-content-md-center py-xl-10">
                <!-- Info -->
                <div class="pb-lg-11 mb-7">
                    <h1 class="font-size-60 font-size-xs-30 text-white font-weight-bold">Let's Traval ✈️ the world
                        🌏 together!</h1>
                    <p class="font-size-20 font-weight-normal text-white">Book adventurous 🎒 experiences you’ll
                        want to tell the world about</p>
                </div>
                <!-- End Info -->
                <div id="like_button_container"></div>

            </div>
            <div class="mb-lg-n16">
                <div class="card border-0 tab-shadow tab-shadow">
                    <div class="card-body mt-1">
                        <form action="{{ route('search') }}">
                            <div class="row d-block nav-select d-lg-flex mb-lg-3 px-3">
                                <div class="col-sm-12 col-lg-10 mb-4 mb-lg-0 ">
                                    <!-- Input -->
                                    <span class="d-block text-gray-1 text-left font-weight-normal mb-0">What do you want to do?</span>

                                    <input type="text" name="q" id="search" class="form-control" placeholder="Search by activity, destination or attraction">
                                </div>
                                <div class="col-sm-12 col-lg-2 align-self-lg-end text-md-right">
                                    <button type="submit" class="btn btn-primary text-white font-weight-bold btn-md mb-xl-0 mb-lg-1 transition-3d-hover">
                                        <i class="flaticon-magnifying-glass font-size-20 mr-2"></i>
                                        Search
                                    </button>
                                </div>
                            </div>
                            <!-- End Checkbox -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5 mb-lg-8 pb-lg-1">
        <div class="w-md-80 w-lg-50 text-center mx-md-auto mt-3">
            <h2 class="section-title text-black font-size-30 font-weight-bold mb-5">Unmissable Destinations</h2>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-5 col-xl-6">
                <div class="mb-5 mb-lg-0">
                    <img class="img-fluid w-100 rounded-top" src="assets/img/630x450/img1.jpg" alt="Image-Description">
                    <div class="bg-pink p-4 p-md-5 px-xl-8 pt-xl-5 pb-xl-7 rounded-bottom">
                        <h6 class="font-size-xs-30 font-size-50 font-weight-bold text-dark-2 mb-1">New York</h6>
                        <p class="text-lh-lg text-dark-2 pr-xl-14 mb-4">Take in the iconic skyline and visit the
                            neighborhood hangouts that you’ve only ever seen on TV.</p>
                        <a href="#" class="btn btn-outline-dark-2 rounded height-51 width-223 transition-3d-hover d-flex align-items-center justify-content-center border-width-2 mb-1">Explore
                            things to do</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-7 col-xl-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 mb-lg-2">
                            <div class="h-100">
                                <div class="position-relative">
                                    <a href="#" class="d-block gradient-overlay-half-bg-gradient-v6">
                                        <img class="img-fluid rounded-xs min-height-230 bg-img-hero w-100" src="assets/img/300x230/img53.jpg" alt="Image-Description">
                                    </a>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="#" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Greater
                                                    London, United Kingdom
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-3">
                                    <a href="../others/destination.html" class="card-title font-size-17 font-weight-medium text-dark">NYC: Priority
                                        or Flexible Statue of Liberty Ticket</a>
                                    <div class="my-2 pb-1">
                                        <span class="badge badge-pill badge-yellow-lighter-2 text-white py-1 px-2 font-size-14 rounded-xs font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">S$350.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Repeatable item -->
                </div>
            </div>
        </div>
    </div>

    <div class="banner-block banner-v5">
        <div class="gradient-overlay-half-bg-orange bg-img-hero space-3 space-bottom-xl-2" style="background-image: url(assets/img/1920x500/img6.jpg);">
            <div class="container">
                <div class="text-center mt-xl-4 mb-xl-7">
                    <h6 class="text-white font-size-40 font-weight-bold mb-2">Who is the Local Expert?</h6>
                    <p class="text-white font-weight-normal mb-5 pb-xl-2">Morbi semper fames lobortis ac hac
                        penatibus</p>
                    <a class="btn btn-outline-white border-width-2 rounded-xs min-width-200 font-weight-normal transition-3d-hover" href="../others/become-expert.html">Become Local Expert</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Cards carousel -->
    <div class="product-card-carousel-block product-card-carousel-v3">
        <div class="container space-top-1">
            <div class="w-md-80 w-lg-50 text-center mx-md-auto mt-3">
                <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">Popular Activities</h2>
            </div>
            <div class="js-slick-carousel u-slick u-slick--equal-height u-slick--gutters-3" data-slides-show="4" data-slides-scroll="1" data-arrows-classes="d-none d-xl-inline-block u-slick__arrow-classic v1 u-slick__arrow-classic--v1 u-slick__arrow-centered--y rounded-circle" data-arrow-left-classes="fas fa-chevron-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left shadow-5 ml-xl-n8" data-arrow-right-classes="fas fa-chevron-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right shadow-5 mr-xl-n8" data-pagi-classes="text-center d-xl-none u-slick__pagination mt-4" data-responsive='[{
                        "breakpoint": 1025,
                        "settings": {
                        "slidesToShow": 3
                        }
                        }, {
                        "breakpoint": 992,
                        "settings": {
                        "slidesToShow": 2
                        }
                        }, {
                        "breakpoint": 768,
                        "settings": {
                        "slidesToShow": 1
                        }
                        }, {
                        "breakpoint": 554,
                        "settings": {
                        "slidesToShow": 1
                        }
                        }]'>
                <div class="js-slide mt-5">
                    <div class="card transition-3d-hover shadow-hover-2 w-100 h-100">
                        <div class="position-relative">
                            <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                <img class="card-img-top" src="assets/img/300x230/img13.jpg" alt="Image Description">
                            </a>
                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                    <span class="flaticon-heart-1 font-size-20"></span>
                                </button>
                            </div>
                            <div class="position-absolute bottom-0 left-0 right-0">
                                <div class="px-4 pb-3">
                                    <a href="../activities/activities-single-v1.html" class="d-block">
                                        <div class="d-flex align-items-center font-size-14 text-white">
                                            <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater
                                            London, United Kingdom
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-4 py-3">
                            <a href="../activities/activities-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">Mangrove Tunnel Kayak
                                Eco <br> Tour</a>
                            <div class="mt-2 mb-3">
                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                            </div>
                            <div class="mb-0">
                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                <span class="font-weight-bold">S$899.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Cards carousel -->

    <!-- Clients v1 -->
    <div class="clients-block clients-v1 border-bottom border-color-8">
        <div class="container space-1">
            <div class="row justify-content-between pb-lg-1 text-center text-md-left">
                <div class="col-12 col-md mb-5">
                    <img class="img-fluid" src="assets/img/200x200/img11.png" alt="Image Description">
                </div>
                <div class="col-12 col-md mb-5">
                    <img class="img-fluid" src="assets/img/200x200/img12.png" alt="Image Description">
                </div>
                <div class="col-12 col-md mb-5">
                    <img class="img-fluid" src="assets/img/200x200/img13.png" alt="Image Description">
                </div>
                <div class="col-12 col-md mb-5">
                    <img class="img-fluid" src="assets/img/200x200/img14.png" alt="Image Description">
                </div>
                <div class="col-12 col-md mb-md-5">
                    <img class="img-fluid" src="assets/img/200x200/img15.png" alt="Image Description">
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')
@endsection