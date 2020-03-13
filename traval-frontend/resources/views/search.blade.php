@extends('partials.master')

@section('title')
Search @stop

@section('styles')
@endsection

@section('content')
<main id="content" role="main" class="pt-6 pt-xl-10">
    <div class="container">
        <div class="row mb-8">
            <div class="col-lg-4 col-xl-3 order-lg-1 width-md-50">
                <div class="navbar-expand-lg navbar-expand-lg-collapse-block">
                    <button class="btn d-lg-none mt-3 mb-4 p-0 collapsed" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="far fa-caret-square-down text-primary font-size-20 card-btn-arrow ml-0"></i>
                        <span class="text-primary ml-2">Sidebar</span>
                    </button>
                    <div id="sidebar" class="collapse navbar-collapse">
                        <div class="mb-6 w-100">
                            <div class="pb-4 mb-2">
                                <div class="sidebar border border-color-1 rounded-xs">
                                    <div class="p-4 mx-1 mb-1">
                                        <!-- Input -->
                                        <span class="d-block text-gray-1  font-weight-normal mb-0 text-left">Destination or Hotel Name</span>
                                        <div class="mb-4">
                                            <div class="input-group border-bottom border-width-2 border-color-1">
                                                <i class="flaticon-pin-1 d-flex align-items-center mr-2 text-primary font-weight-semi-bold font-size-22"></i>
                                                <input type="text" class="form-control font-weight-bold font-size-16 shadow-none hero-form font-weight-bold border-0 p-0" placeholder="Where are you going?" aria-label="Keyword or title" aria-describedby="keywordInputAddon">
                                            </div>
                                        </div>
                                        <!-- End Input -->
                                        <!-- Input -->
                                        <span class="d-block text-gray-1 text-left font-weight-normal mb-0">From - To</span>
                                        <div class="border-bottom border-width-2 border-color-1 mb-4">
                                            <div id="datepickerWrapperFromOne" class="u-datepicker input-group flex-nowrap">
                                                <div class="input-group-prepend">
                                                    <span class="d-flex align-items-center mr-2 font-size-21">
                                                        <i class="flaticon-calendar text-primary font-weight-semi-bold"></i>
                                                    </span>
                                                </div>
                                                <input class="js-range-datepicker font-size-16 ml-1 shadow-none font-weight-bold form-control hero-form bg-transparent border-0 flatpickr-input p-0" type="date" data-rp-wrapper="#datepickerWrapperFromOne" data-rp-type="range" data-rp-date-format="M d / Y" data-rp-default-date='["Jul 7 / 2020", "Aug 25 / 2020"]'>
                                            </div>
                                            <!-- End Datepicker -->
                                        </div>
                                        <!-- End Input -->

                                        <div class="col dropdown-custom px-0 mb-5">
                                            <!-- Input -->
                                            <span class="d-block text-gray-1 text-left font-weight-normal mb-2">Activity Types</span>
                                            <div class="flex-horizontal-center border-bottom border-width-2 border-color-1 pb-2">
                                                <i class="flaticon-backpack d-flex align-items-center mr-2 font-size-24 text-primary"></i>
                                                <select class="js-select selectpicker dropdown-select bootstrap-select__custom-nav" data-style="btn-sm mt-1 py-0 px-0  text-black font-size-16 font-weight-semi-bold d-flex align-items-center">
                                                    <option value="one" selected>Food & Nightlife</option>
                                                    <option value="two">Village Tour</option>
                                                    <option value="three">Holiday Tour</option>
                                                    <option value="four">City Tour</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary height-60 w-100 font-weight-bold mb-xl-0 mb-lg-1 transition-3d-hover"><i class="flaticon-magnifying-glass mr-2 font-size-17"></i>Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-4 mb-2">
                                <a href="https://goo.gl/maps/kCVqYkjHX3XvoC4B9" class="d-block border rounded">
                                    <img class="img-fluid" src="assets/img/map-markers/map.jpg" alt="Image-Description">
                                </a>
                            </div>
                            <!-- Checkboxes -->
                            <div class="sidenav border rounded">
                                <!-- Accordiaon -->
                                <div id="shopRatingAccordion" class="accordion rounded-0 shadow-none border-bottom">
                                    <div class="border-0">
                                        <div class="card-collapse" id="shopCategoryHeadingOne">
                                            <h3 class="mb-0">
                                                <button type="button" class="btn btn-link btn-block card-btn py-2 px-5 text-lh-3 collapsed" data-toggle="collapse" data-target="#shopRatingOne" aria-expanded="false" aria-controls="shopRatingOne">
                                                    <span class="row align-items-center">
                                                        <span class="col-9">
                                                            <span class="d-block font-size-lg-15 font-size-17 font-weight-bold text-dark text-lh-1dot4">Star Ratings</span>
                                                        </span>
                                                        <span class="col-3 text-right">
                                                            <span class="card-btn-arrow">
                                                                <span class="fas fa-chevron-down small"></span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </button>
                                            </h3>
                                        </div>
                                        <div id="shopRatingOne" class="collapse show" aria-labelledby="shopCategoryHeadingOne" data-parent="#shopRatingAccordion">
                                            <div class="card-body pt-0 mt-1 px-5">
                                                <!-- Checkboxes -->
                                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="brandAdidas">
                                                        <label class="custom-control-label text-lh-inherit text-color-1" for="brandAdidas">
                                                            <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary">
                                                                <div class="green-lighter ml-1 letter-spacing-2">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="brandNewBalance">
                                                        <label class="custom-control-label text-lh-inherit text-color-1" for="brandNewBalance">
                                                            <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary">
                                                                <div class="green-lighter ml-1 letter-spacing-2">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="brandNike">
                                                        <label class="custom-control-label text-lh-inherit text-color-1" for="brandNike">
                                                            <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary">
                                                                <div class="green-lighter ml-1 letter-spacing-2">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="brandFredPerry">
                                                        <label class="custom-control-label text-lh-inherit text-color-1" for="brandFredPerry">
                                                            <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary">
                                                                <div class="green-lighter ml-1 letter-spacing-2">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="shopCartAccordion" class="accordion rounded shadow-none">
                                    <div class="border-0">
                                        <div class="card-collapse" id="shopCardHeadingOne">
                                            <h3 class="mb-0">
                                                <button type="button" class="btn btn-link btn-block card-btn py-2 px-5 text-lh-3 collapsed" data-toggle="collapse" data-target="#shopCardOne" aria-expanded="false" aria-controls="shopCardOne">
                                                    <span class="row align-items-center">
                                                        <span class="col-9">
                                                            <span class="d-block font-size-lg-15 font-size-17 font-weight-bold text-dark">Price Range ($)</span>
                                                        </span>
                                                        <span class="col-3 text-right">
                                                            <span class="card-btn-arrow">
                                                                <span class="fas fa-chevron-down small"></span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </button>
                                            </h3>
                                        </div>
                                        <div id="shopCardOne" class="collapse show" aria-labelledby="shopCardHeadingOne" data-parent="#shopCartAccordion">
                                            <div class="card-body pt-0 px-5">
                                                <div class="pb-3 mb-1 d-flex text-lh-1">
                                                    <span>£</span>
                                                    <span id="rangeSliderExample3MinResult" class=""></span>
                                                    <span class="mx-0dot5"> — </span>
                                                    <span>£</span>
                                                    <span id="rangeSliderExample3MaxResult" class=""></span>
                                                </div>
                                                <input class="js-range-slider" type="text" data-extra-classes="u-range-slider height-35" data-type="double" data-grid="false" data-hide-from-to="true" data-min="0" data-max="3456" data-from="200" data-to="3456" data-prefix="$" data-result-min="#rangeSliderExample3MinResult" data-result-max="#rangeSliderExample3MaxResult">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="shopCategoryAccordion" class="accordion rounded-0 shadow-none border-top">
                                    <div class="border-0">
                                        <div class="card-collapse" id="shopCategoryHeadingOne">
                                            <h3 class="mb-0">
                                                <button type="button" class="btn btn-link btn-block card-btn py-2 px-5 text-lh-3 collapsed" data-toggle="collapse" data-target="#shopCategoryOne" aria-expanded="false" aria-controls="shopCategoryOne">
                                                    <span class="row align-items-center">
                                                        <span class="col-9">
                                                            <span class="d-block font-size-lg-15 font-size-17 font-weight-bold text-dark">Duration</span>
                                                        </span>
                                                        <span class="col-3 text-right">
                                                            <span class="card-btn-arrow">
                                                                <span class="fas fa-chevron-down small"></span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </button>
                                            </h3>
                                        </div>
                                        <div id="shopCategoryOne" class="collapse show" aria-labelledby="shopCategoryHeadingOne" data-parent="#shopCategoryAccordion">
                                            <div class="card-body pt-0 mt-1 px-5">
                                                <!-- Checkboxes -->
                                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="brandAdidas1">
                                                        <label class="custom-control-label text-color-1" for="brandAdidas1">0 – 3 hours</label>
                                                    </div>
                                                </div>
                                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="brandNewBalance1">
                                                        <label class="custom-control-label text-color-1" for="brandNewBalance1">3 – 5 hours</label>
                                                    </div>
                                                </div>
                                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="brandNike1">
                                                        <label class="custom-control-label text-color-1" for="brandNike1">5 – 7 hours</label>
                                                    </div>
                                                </div>
                                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="brandFredPerry1">
                                                        <label class="custom-control-label text-color-1" for="brandFredPerry1">Full day (7+ hours)</label>
                                                    </div>
                                                </div>
                                                <!-- End Checkboxes -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="shopLanguagesAccordion" class="accordion rounded-0 shadow-none border-top">
                                    <div class="border-0">
                                        <div class="card-collapse" id="shopLanguagesHeadingOne">
                                            <h3 class="mb-0">
                                                <button type="button" class="btn btn-link btn-block card-btn py-2 px-5 text-lh-3 collapsed" data-toggle="collapse" data-target="#shopLanguagesOne" aria-expanded="false" aria-controls="shopLanguagesOne">
                                                    <span class="row align-items-center">
                                                        <span class="col-9">
                                                            <span class="d-block font-size-lg-15 font-size-17 font-weight-bold text-dark">Languages</span>
                                                        </span>
                                                        <span class="col-3 text-right">
                                                            <span class="card-btn-arrow">
                                                                <span class="fas fa-chevron-down small"></span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </button>
                                            </h3>
                                        </div>
                                        <div id="shopLanguagesOne" class="collapse show" aria-labelledby="shopLanguagesHeadingOne" data-parent="#shopLanguagesAccordion">
                                            <div class="card-body pt-0 mt-1 px-5">
                                                <!-- Checkboxes -->
                                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="brandAdidas8">
                                                        <label class="custom-control-label text-color-1" for="brandAdidas8">English</label>
                                                    </div>
                                                </div>
                                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="brandNewBalance4">
                                                        <label class="custom-control-label text-color-1" for="brandNewBalance4">Espanol</label>
                                                    </div>
                                                </div>
                                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="brandNike7">
                                                        <label class="custom-control-label text-color-1" for="brandNike7">Turkish</label>
                                                    </div>
                                                </div>
                                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="brandFredPerry9">
                                                        <label class="custom-control-label text-color-1" for="brandFredPerry9">Japanese</label>
                                                    </div>
                                                </div>
                                                <!-- End Checkboxes -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Accordion -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-9 order-md-1 order-lg-2 pb-5 pb-lg-0">
                <!-- Shop-control-bar Title -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="font-size-21 font-weight-bold mb-0 text-lh-1">693 activity found</h3>
                    <ul class="nav tab-nav-shop" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link font-size-22 p-0" id="pills-three-example1-tab" data-toggle="pill" href="#pills-three-example1" role="tab" aria-controls="pills-three-example1" aria-selected="true">
                                <div class="d-md-flex justify-content-md-center align-items-md-center">
                                    <i class="fa fa-list"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-size-22 p-0 ml-2 active" id="pills-one-example1-tab" data-toggle="pill" href="#pills-one-example1" role="tab" aria-controls="pills-one-example1" aria-selected="false">
                                <div class="d-md-flex justify-content-md-center align-items-md-center">
                                    <i class="fa fa-th"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End shop-control-bar Title -->

                <!-- Slick Tab carousel -->
                <div class="u-slick__tab">
                    <!-- Nav Links -->
                    <div class="mb-5">
                        <ul class="nav flex-nowrap border border-radius-3 tab-nav align-items-center py-2 px-0" role="tablist">
                            <li class="nav-item d-flex align-items-center flex-shrink-0 flex-xl-shrink-1">
                                <a href="#" class="nav-link font-weight-normal text-gray-1 text-lh-1dot6 py-1 px-4 px-wd-5 font-weight-normal font-size-15 ">Recommended
                                </a>
                            </li>
                            <li class="nav-item d-flex align-items-center flex-shrink-0 flex-xl-shrink-1 border-left">
                                <select class="js-select selectpicker dropdown-select bootstrap-select__custom-nav w-auto" data-style="btn-sm py-1 px-4 px-wd-5 font-weight-normal font-size-15  text-gray-1 d-flex align-items-center">
                                    <option value="one" selected>Price</option>
                                    <option value="two">Two</option>
                                    <option value="three">Three</option>
                                    <option value="four">Four</option>
                                </select>
                            </li>
                            <li class="nav-item d-flex align-items-center flex-shrink-0 flex-xl-shrink-1 border-left">
                                <select class="js-select selectpicker dropdown-select bootstrap-select__custom-nav w-auto" data-style="btn-sm py-1 px-4 px-wd-5 font-weight-normal font-size-15  text-gray-1 d-flex align-items-center">
                                    <option value="one" selected>Stars</option>
                                    <option value="two">Two</option>
                                    <option value="three">Three</option>
                                    <option value="four">Four</option>
                                </select>
                            </li>
                            <li class="nav-item d-flex align-items-center flex-shrink-0 flex-xl-shrink-1 border-left">
                                <a href="#" class="nav-link font-weight-normal text-gray-1 text-lh-1dot6 py-1 px-4 px-wd-5 font-weight-normal font-size-15 ">Guest Rating
                                </a>
                            </li>
                            <li class="nav-item d-flex align-items-center flex-shrink-0 flex-xl-shrink-1 border-left">
                                <a href="#" class="nav-link font-weight-normal text-gray-1 text-lh-1dot6 py-1 px-4 px-wd-5 font-weight-normal font-size-15 ">Distance
                                </a>
                            </li>
                            <li class="nav-item d-flex align-items-center flex-shrink-0 flex-xl-shrink-1 border-left">
                                <a href="#" class="nav-link font-weight-normal text-gray-1 text-lh-1dot6 py-1 px-4 px-wd-5 font-weight-normal font-size-15 ">Top Reviewed
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Nav Links -->

                    <!-- Tab Content -->
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade mb-5 mb-xl-0" id="pills-three-example1" role="tabpanel" aria-labelledby="pills-three-example1-tab" data-target-group="groups">
                            <ul class="d-block list-unstyled products-group prodcut-list-view">
                                <li class="card mb-5 overflow-hidden">
                                    <div class="product-item__outer w-100">
                                        <div class="row">
                                            <div class="col-md-5 col-lg-6 col-xl-4">
                                                <div class="product-item__header">
                                                    <div class="position-relative">
                                                        <div class="js-slick-carousel u-slick u-slick--equal-height u-slick--gutters-3" data-slides-show="1" data-slides-scroll="1" data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic v4 u-slick__arrow-classic--v4 u-slick__arrow-centered--y rounded-circle" data-arrow-left-classes="flaticon-back u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left" data-arrow-right-classes="flaticon-next u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right" data-pagi-classes="js-pagination text-center u-slick__pagination u-slick__pagination--white position-absolute right-0 bottom-0 left-0 mb-3 mb-0">
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img13.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img14.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img15.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img16.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img43.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img44.jpg"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col col-md-7 col-lg-6 col-xl-5 flex-horizontal-center">
                                                <div class="w-100 position-relative m-4 m-md-0">
                                                    <div class="position-absolute top-0 right-0 pr-md-3 d-none d-md-block">
                                                        <button type="button" class="btn btn-sm btn-icon rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                            <span class="flaticon-heart-1 font-size-20"></span>
                                                        </button>
                                                    </div>
                                                    <div class="mb-2 flex-horizontal-center pb-1">
                                                        <a href="../activities/activities-single-v1.html">
                                                            <span class="badge badge-pill bg-blue-1 text-white px-4 py-1 font-size-14 font-weight-normal text-lh-1dot6">Featured</span>
                                                        </a>
                                                        <a href="../activities/activities-single-v1.html" class="ml-3">
                                                            <span class="badge badge-pill bg-pink-1 text-white px-3 py-1 font-size-14 font-weight-normal text-lh-1dot6">%25</span>
                                                        </a>
                                                    </div>
                                                    <a href="../activities/activities-single-v1.html" class="mr-xl-5 d-block text-dark">
                                                        <span class="font-weight-bold font-size-17 mr-xl-9 d-block">Water Activities at Cenang Beach in Langkawi</span>
                                                    </a>
                                                    <div class="my-2">
                                                        <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                                    </div>
                                                    <div class="card-body p-0 mt-2">
                                                        <a href="../activities/activities-single-v1.html" class="d-block">
                                                            <div class="d-flex align-items-center font-size-14 text-gray-1">
                                                                <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom - <span class="text-primary pl-1"> View on map</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col col-xl-3 align-self-center py-4 py-xl-0 border-top border-xl-top-0">
                                                <div class="flex-content-center border-xl-left py-xl-5 ml-4 ml-xl-0 justify-content-start justify-content-xl-center">
                                                    <div class="text-center my-xl-1">
                                                        <div class="mb-2 pb-1">
                                                            <span class="font-size-14 mr-1">From </span>
                                                            <span class="font-weight-bold font-size-22">£899.00</span>
                                                        </div>
                                                        <a href="../activities/activities-single-v1.html" class="btn btn-outline-primary d-flex align-items-center justify-content-center font-weight-bold min-height-50 border-radius-3 border-width-2 px-2 px-5 py-2">View Detail</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="card mb-5 overflow-hidden">
                                    <div class="product-item__outer w-100">
                                        <div class="row">
                                            <div class="col-md-5 col-lg-6 col-xl-4">
                                                <div class="product-item__header">
                                                    <div class="position-relative">
                                                        <div class="js-slick-carousel u-slick u-slick--equal-height u-slick--gutters-3" data-slides-show="1" data-slides-scroll="1" data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic v4 u-slick__arrow-classic--v4 u-slick__arrow-centered--y rounded-circle" data-arrow-left-classes="flaticon-back u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left" data-arrow-right-classes="flaticon-next u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right" data-pagi-classes="js-pagination text-center u-slick__pagination u-slick__pagination--white position-absolute right-0 bottom-0 left-0 mb-3 mb-0">
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img14.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img13.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img15.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img16.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img43.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img44.jpg"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col col-md-7 col-lg-6 col-xl-5 flex-horizontal-center">
                                                <div class="w-100 position-relative m-4 m-md-0">
                                                    <div class="position-absolute top-0 right-0 pr-md-3 d-none d-md-block">
                                                        <button type="button" class="btn btn-sm btn-icon rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                            <span class="flaticon-heart-1 font-size-20"></span>
                                                        </button>
                                                    </div>
                                                    <div class="mb-2 flex-horizontal-center pb-1">
                                                        <a href="../activities/activities-single-v1.html">
                                                            <span class="badge badge-pill bg-blue-1 text-white px-4 py-1 font-size-14 font-weight-normal text-lh-1dot6">Featured</span>
                                                        </a>
                                                        <a href="../activities/activities-single-v1.html" class="ml-3">
                                                            <span class="badge badge-pill bg-pink-1 text-white px-3 py-1 font-size-14 font-weight-normal text-lh-1dot6">%25</span>
                                                        </a>
                                                    </div>
                                                    <a href="../activities/activities-single-v1.html" class="mr-xl-5 d-block text-dark">
                                                        <span class="font-weight-bold font-size-17 mr-xl-9 d-block">Banana Boat Activity in Boracay</span>
                                                    </a>
                                                    <div class="my-2">
                                                        <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                                    </div>
                                                    <div class="card-body p-0 mt-2">
                                                        <a href="../activities/activities-single-v1.html" class="d-block">
                                                            <div class="d-flex align-items-center font-size-14 text-gray-1">
                                                                <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom - <span class="text-primary pl-1"> View on map</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col col-xl-3 align-self-center py-4 py-xl-0 border-top border-xl-top-0">
                                                <div class="flex-content-center border-xl-left py-xl-5 ml-4 ml-xl-0 justify-content-start justify-content-xl-center">
                                                    <div class="text-center my-xl-1">
                                                        <div class="mb-2 pb-1">
                                                            <span class="font-size-14 mr-1">From </span>
                                                            <span class="font-weight-bold font-size-22">£899.00</span>
                                                        </div>
                                                        <a href="../activities/activities-single-v1.html" class="btn btn-outline-primary d-flex align-items-center justify-content-center font-weight-bold min-height-50 border-radius-3 border-width-2 px-2 px-5 py-2">View Detail</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="card mb-5 overflow-hidden">
                                    <div class="product-item__outer w-100">
                                        <div class="row">
                                            <div class="col-md-5 col-lg-6 col-xl-4">
                                                <div class="product-item__header">
                                                    <div class="position-relative">
                                                        <div class="js-slick-carousel u-slick u-slick--equal-height u-slick--gutters-3" data-slides-show="1" data-slides-scroll="1" data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic v4 u-slick__arrow-classic--v4 u-slick__arrow-centered--y rounded-circle" data-arrow-left-classes="flaticon-back u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left" data-arrow-right-classes="flaticon-next u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right" data-pagi-classes="js-pagination text-center u-slick__pagination u-slick__pagination--white position-absolute right-0 bottom-0 left-0 mb-3 mb-0">
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img15.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img14.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img13.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img16.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img43.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img44.jpg"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col col-md-7 col-lg-6 col-xl-5 flex-horizontal-center">
                                                <div class="w-100 position-relative m-4 m-md-0">
                                                    <div class="position-absolute top-0 right-0 pr-md-3 d-none d-md-block">
                                                        <button type="button" class="btn btn-sm btn-icon rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                            <span class="flaticon-heart-1 font-size-20"></span>
                                                        </button>
                                                    </div>
                                                    <div class="mb-2 flex-horizontal-center pb-1">
                                                        <a href="../activities/activities-single-v1.html">
                                                            <span class="badge badge-pill bg-blue-1 text-white px-4 py-1 font-size-14 font-weight-normal text-lh-1dot6">Featured</span>
                                                        </a>
                                                        <a href="../activities/activities-single-v1.html" class="ml-3">
                                                            <span class="badge badge-pill bg-pink-1 text-white px-3 py-1 font-size-14 font-weight-normal text-lh-1dot6">%25</span>
                                                        </a>
                                                    </div>
                                                    <a href="../activities/activities-single-v1.html" class="mr-xl-5 d-block text-dark">
                                                        <span class="font-weight-bold font-size-17 mr-xl-9 d-block">Fitzroy Island Day Tour & Water Activities</span>
                                                    </a>
                                                    <div class="my-2">
                                                        <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                                    </div>
                                                    <div class="card-body p-0 mt-2">
                                                        <a href="../activities/activities-single-v1.html" class="d-block">
                                                            <div class="d-flex align-items-center font-size-14 text-gray-1">
                                                                <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom - <span class="text-primary pl-1"> View on map</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col col-xl-3 align-self-center py-4 py-xl-0 border-top border-xl-top-0">
                                                <div class="flex-content-center border-xl-left py-xl-5 ml-4 ml-xl-0 justify-content-start justify-content-xl-center">
                                                    <div class="text-center my-xl-1">
                                                        <div class="mb-2 pb-1">
                                                            <span class="font-size-14 mr-1">From </span>
                                                            <span class="font-weight-bold font-size-22">£899.00</span>
                                                        </div>
                                                        <a href="../activities/activities-single-v1.html" class="btn btn-outline-primary d-flex align-items-center justify-content-center font-weight-bold min-height-50 border-radius-3 border-width-2 px-2 px-5 py-2">View Detail</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="card mb-5 overflow-hidden">
                                    <div class="product-item__outer w-100">
                                        <div class="row">
                                            <div class="col-md-5 col-lg-6 col-xl-4">
                                                <div class="product-item__header">
                                                    <div class="position-relative">
                                                        <div class="js-slick-carousel u-slick u-slick--equal-height u-slick--gutters-3" data-slides-show="1" data-slides-scroll="1" data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic v4 u-slick__arrow-classic--v4 u-slick__arrow-centered--y rounded-circle" data-arrow-left-classes="flaticon-back u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left" data-arrow-right-classes="flaticon-next u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right" data-pagi-classes="js-pagination text-center u-slick__pagination u-slick__pagination--white position-absolute right-0 bottom-0 left-0 mb-3 mb-0">
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img16.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img14.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img15.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img13.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img43.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img44.jpg"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col col-md-7 col-lg-6 col-xl-5 flex-horizontal-center">
                                                <div class="w-100 position-relative m-4 m-md-0">
                                                    <div class="position-absolute top-0 right-0 pr-md-3 d-none d-md-block">
                                                        <button type="button" class="btn btn-sm btn-icon rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                            <span class="flaticon-heart-1 font-size-20"></span>
                                                        </button>
                                                    </div>
                                                    <div class="mb-2 flex-horizontal-center pb-1">
                                                        <a href="../activities/activities-single-v1.html">
                                                            <span class="badge badge-pill bg-blue-1 text-white px-4 py-1 font-size-14 font-weight-normal text-lh-1dot6">Featured</span>
                                                        </a>
                                                        <a href="../activities/activities-single-v1.html" class="ml-3">
                                                            <span class="badge badge-pill bg-pink-1 text-white px-3 py-1 font-size-14 font-weight-normal text-lh-1dot6">%25</span>
                                                        </a>
                                                    </div>
                                                    <a href="../activities/activities-single-v1.html" class="mr-xl-5 d-block text-dark">
                                                        <span class="font-weight-bold font-size-17 mr-xl-9 d-block">Water Activities at Cenang Beach in Langkawi</span>
                                                    </a>
                                                    <div class="my-2">
                                                        <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                                    </div>
                                                    <div class="card-body p-0 mt-2">
                                                        <a href="../activities/activities-single-v1.html" class="d-block">
                                                            <div class="d-flex align-items-center font-size-14 text-gray-1">
                                                                <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom - <span class="text-primary pl-1"> View on map</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col col-xl-3 align-self-center py-4 py-xl-0 border-top border-xl-top-0">
                                                <div class="flex-content-center border-xl-left py-xl-5 ml-4 ml-xl-0 justify-content-start justify-content-xl-center">
                                                    <div class="text-center my-xl-1">
                                                        <div class="mb-2 pb-1">
                                                            <span class="font-size-14 mr-1">From </span>
                                                            <span class="font-weight-bold font-size-22">£899.00</span>
                                                        </div>
                                                        <a href="../activities/activities-single-v1.html" class="btn btn-outline-primary d-flex align-items-center justify-content-center font-weight-bold min-height-50 border-radius-3 border-width-2 px-2 px-5 py-2">View Detail</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="card mb-5 overflow-hidden">
                                    <div class="product-item__outer w-100">
                                        <div class="row">
                                            <div class="col-md-5 col-lg-6 col-xl-4">
                                                <div class="product-item__header">
                                                    <div class="position-relative">
                                                        <div class="js-slick-carousel u-slick u-slick--equal-height u-slick--gutters-3" data-slides-show="1" data-slides-scroll="1" data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic v4 u-slick__arrow-classic--v4 u-slick__arrow-centered--y rounded-circle" data-arrow-left-classes="flaticon-back u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left" data-arrow-right-classes="flaticon-next u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right" data-pagi-classes="js-pagination text-center u-slick__pagination u-slick__pagination--white position-absolute right-0 bottom-0 left-0 mb-3 mb-0">
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img43.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img14.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img15.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img16.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img13.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img44.jpg"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col col-md-7 col-lg-6 col-xl-5 flex-horizontal-center">
                                                <div class="w-100 position-relative m-4 m-md-0">
                                                    <div class="position-absolute top-0 right-0 pr-md-3 d-none d-md-block">
                                                        <button type="button" class="btn btn-sm btn-icon rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                            <span class="flaticon-heart-1 font-size-20"></span>
                                                        </button>
                                                    </div>
                                                    <div class="mb-2 flex-horizontal-center pb-1">
                                                        <a href="../activities/activities-single-v2.html">
                                                            <span class="badge badge-pill bg-blue-1 text-white px-4 py-1 font-size-14 font-weight-normal text-lh-1dot6">Featured</span>
                                                        </a>
                                                        <a href="../activities/activities-single-v2.html" class="ml-3">
                                                            <span class="badge badge-pill bg-pink-1 text-white px-3 py-1 font-size-14 font-weight-normal text-lh-1dot6">%25</span>
                                                        </a>
                                                    </div>
                                                    <a href="../activities/activities-single-v2.html" class="mr-xl-5 d-block text-dark">
                                                        <span class="font-weight-bold font-size-17 mr-xl-9 d-block">Banana Boat Activity in Boracay</span>
                                                    </a>
                                                    <div class="my-2">
                                                        <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                                    </div>
                                                    <div class="card-body p-0 mt-2">
                                                        <a href="../activities/activities-single-v2.html" class="d-block">
                                                            <div class="d-flex align-items-center font-size-14 text-gray-1">
                                                                <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom - <span class="text-primary pl-1"> View on map</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col col-xl-3 align-self-center py-4 py-xl-0 border-top border-xl-top-0">
                                                <div class="flex-content-center border-xl-left py-xl-5 ml-4 ml-xl-0 justify-content-start justify-content-xl-center">
                                                    <div class="text-center my-xl-1">
                                                        <div class="mb-2 pb-1">
                                                            <span class="font-size-14 mr-1">From </span>
                                                            <span class="font-weight-bold font-size-22">£899.00</span>
                                                        </div>
                                                        <a href="../activities/activities-single-v1.html" class="btn btn-outline-primary d-flex align-items-center justify-content-center font-weight-bold min-height-50 border-radius-3 border-width-2 px-2 px-5 py-2">View Detail</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="card mb-5 overflow-hidden">
                                    <div class="product-item__outer w-100">
                                        <div class="row">
                                            <div class="col-md-5 col-lg-6 col-xl-4">
                                                <div class="product-item__header">
                                                    <div class="position-relative">
                                                        <div class="js-slick-carousel u-slick u-slick--equal-height u-slick--gutters-3" data-slides-show="1" data-slides-scroll="1" data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic v4 u-slick__arrow-classic--v4 u-slick__arrow-centered--y rounded-circle" data-arrow-left-classes="flaticon-back u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left" data-arrow-right-classes="flaticon-next u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right" data-pagi-classes="js-pagination text-center u-slick__pagination u-slick__pagination--white position-absolute right-0 bottom-0 left-0 mb-3 mb-0">
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img44.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img14.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img15.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img16.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img43.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img13.jpg"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col col-md-7 col-lg-6 col-xl-5 flex-horizontal-center">
                                                <div class="w-100 position-relative m-4 m-md-0">
                                                    <div class="position-absolute top-0 right-0 pr-md-3 d-none d-md-block">
                                                        <button type="button" class="btn btn-sm btn-icon rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                            <span class="flaticon-heart-1 font-size-20"></span>
                                                        </button>
                                                    </div>
                                                    <div class="mb-2 flex-horizontal-center pb-1">
                                                        <a href="../activities/activities-single-v2.html">
                                                            <span class="badge badge-pill bg-blue-1 text-white px-4 py-1 font-size-14 font-weight-normal text-lh-1dot6">Featured</span>
                                                        </a>
                                                        <a href="../activities/activities-single-v2.html" class="ml-3">
                                                            <span class="badge badge-pill bg-pink-1 text-white px-3 py-1 font-size-14 font-weight-normal text-lh-1dot6">%25</span>
                                                        </a>
                                                    </div>
                                                    <a href="../activities/activities-single-v2.html" class="mr-xl-5 d-block text-dark">
                                                        <span class="font-weight-bold font-size-17 mr-xl-9 d-block">Fitzroy Island Day Tour & Water Activities</span>
                                                    </a>
                                                    <div class="my-2">
                                                        <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                                    </div>
                                                    <div class="card-body p-0 mt-2">
                                                        <a href="../activities/activities-single-v2.html" class="d-block">
                                                            <div class="d-flex align-items-center font-size-14 text-gray-1">
                                                                <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom - <span class="text-primary pl-1"> View on map</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col col-xl-3 align-self-center py-4 py-xl-0 border-top border-xl-top-0">
                                                <div class="flex-content-center border-xl-left py-xl-5 ml-4 ml-xl-0 justify-content-start justify-content-xl-center">
                                                    <div class="text-center my-xl-1">
                                                        <div class="mb-2 pb-1">
                                                            <span class="font-size-14 mr-1">From </span>
                                                            <span class="font-weight-bold font-size-22">£899.00</span>
                                                        </div>
                                                        <a href="../activities/activities-single-v1.html" class="btn btn-outline-primary d-flex align-items-center justify-content-center font-weight-bold min-height-50 border-radius-3 border-width-2 px-2 px-5 py-2">View Detail</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="card mb-5 overflow-hidden">
                                    <div class="product-item__outer w-100">
                                        <div class="row">
                                            <div class="col-md-5 col-lg-6 col-xl-4">
                                                <div class="product-item__header">
                                                    <div class="position-relative">
                                                        <div class="js-slick-carousel u-slick u-slick--equal-height u-slick--gutters-3" data-slides-show="1" data-slides-scroll="1" data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic v4 u-slick__arrow-classic--v4 u-slick__arrow-centered--y rounded-circle" data-arrow-left-classes="flaticon-back u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left" data-arrow-right-classes="flaticon-next u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right" data-pagi-classes="js-pagination text-center u-slick__pagination u-slick__pagination--white position-absolute right-0 bottom-0 left-0 mb-3 mb-0">
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img13.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img14.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img15.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img16.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img43.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img44.jpg"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col col-md-7 col-lg-6 col-xl-5 flex-horizontal-center">
                                                <div class="w-100 position-relative m-4 m-md-0">
                                                    <div class="position-absolute top-0 right-0 pr-md-3 d-none d-md-block">
                                                        <button type="button" class="btn btn-sm btn-icon rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                            <span class="flaticon-heart-1 font-size-20"></span>
                                                        </button>
                                                    </div>
                                                    <div class="mb-2 flex-horizontal-center pb-1">
                                                        <a href="../activities/activities-single-v2.html">
                                                            <span class="badge badge-pill bg-blue-1 text-white px-4 py-1 font-size-14 font-weight-normal text-lh-1dot6">Featured</span>
                                                        </a>
                                                        <a href="../activities/activities-single-v2.html" class="ml-3">
                                                            <span class="badge badge-pill bg-pink-1 text-white px-3 py-1 font-size-14 font-weight-normal text-lh-1dot6">%25</span>
                                                        </a>
                                                    </div>
                                                    <a href="../activities/activities-single-v2.html" class="mr-xl-5 d-block text-dark">
                                                        <span class="font-weight-bold font-size-17 mr-xl-9 d-block">Pawna Lake Overnight Camping & Day Adventure Activities</span>
                                                    </a>
                                                    <div class="my-2">
                                                        <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                                    </div>
                                                    <div class="card-body p-0 mt-2">
                                                        <a href="../activities/activities-single-v2.html" class="d-block">
                                                            <div class="d-flex align-items-center font-size-14 text-gray-1">
                                                                <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom - <span class="text-primary pl-1"> View on map</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col col-xl-3 align-self-center py-4 py-xl-0 border-top border-xl-top-0">
                                                <div class="flex-content-center border-xl-left py-xl-5 ml-4 ml-xl-0 justify-content-start justify-content-xl-center">
                                                    <div class="text-center my-xl-1">
                                                        <div class="mb-2 pb-1">
                                                            <span class="font-size-14 mr-1">From </span>
                                                            <span class="font-weight-bold font-size-22">£899.00</span>
                                                        </div>
                                                        <a href="../activities/activities-single-v1.html" class="btn btn-outline-primary d-flex align-items-center justify-content-center font-weight-bold min-height-50 border-radius-3 border-width-2 px-2 px-5 py-2">View Detail</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="card mb-5 overflow-hidden">
                                    <div class="product-item__outer w-100">
                                        <div class="row">
                                            <div class="col-md-5 col-lg-6 col-xl-4">
                                                <div class="product-item__header">
                                                    <div class="position-relative">
                                                        <div class="js-slick-carousel u-slick u-slick--equal-height u-slick--gutters-3" data-slides-show="1" data-slides-scroll="1" data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic v4 u-slick__arrow-classic--v4 u-slick__arrow-centered--y rounded-circle" data-arrow-left-classes="flaticon-back u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left" data-arrow-right-classes="flaticon-next u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right" data-pagi-classes="js-pagination text-center u-slick__pagination u-slick__pagination--white position-absolute right-0 bottom-0 left-0 mb-3 mb-0">
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img14.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img13.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img15.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img16.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img43.jpg"></a>
                                                            </div>
                                                            <div class="js-slide">
                                                                <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid" src="assets/img/300x230/img44.jpg"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col col-md-7 col-lg-6 col-xl-5 flex-horizontal-center">
                                                <div class="w-100 position-relative m-4 m-md-0">
                                                    <div class="position-absolute top-0 right-0 pr-md-3 d-none d-md-block">
                                                        <button type="button" class="btn btn-sm btn-icon rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                            <span class="flaticon-heart-1 font-size-20"></span>
                                                        </button>
                                                    </div>
                                                    <div class="mb-2 flex-horizontal-center pb-1">
                                                        <a href="../activities/activities-single-v2.html">
                                                            <span class="badge badge-pill bg-blue-1 text-white px-4 py-1 font-size-14 font-weight-normal text-lh-1dot6">Featured</span>
                                                        </a>
                                                        <a href="../activities/activities-single-v2.html" class="ml-3">
                                                            <span class="badge badge-pill bg-pink-1 text-white px-3 py-1 font-size-14 font-weight-normal text-lh-1dot6">%25</span>
                                                        </a>
                                                    </div>
                                                    <a href="../activities/activities-single-v2.html" class="mr-xl-5 d-block text-dark">
                                                        <span class="font-weight-bold font-size-17 mr-xl-9 d-block">Phuket Private Trip with Outdoor Activities</span>
                                                    </a>
                                                    <div class="my-2">
                                                        <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                                    </div>
                                                    <div class="card-body p-0 mt-2">
                                                        <a href="../activities/activities-single-v2.html" class="d-block">
                                                            <div class="d-flex align-items-center font-size-14 text-gray-1">
                                                                <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom - <span class="text-primary pl-1"> View on map</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col col-xl-3 align-self-center py-4 py-xl-0 border-top border-xl-top-0">
                                                <div class="flex-content-center border-xl-left py-xl-5 ml-4 ml-xl-0 justify-content-start justify-content-xl-center">
                                                    <div class="text-center my-xl-1">
                                                        <div class="mb-2 pb-1">
                                                            <span class="font-size-14 mr-1">From </span>
                                                            <span class="font-weight-bold font-size-22">£899.00</span>
                                                        </div>
                                                        <a href="../activities/activities-single-v1.html" class="btn btn-outline-primary d-flex align-items-center justify-content-center font-weight-bold min-height-50 border-radius-3 border-width-2 px-2 px-5 py-2">View Detail</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="text-center text-md-left font-size-14 mb-3 text-lh-1">Showing 1–15</div>
                            <nav aria-label="Page navigation">
                                <ul class="list-pagination-1 pagination border border-color-4 rounded-sm mb-5 mb-lg-0 overflow-auto overflow-xl-visible justify-content-md-center align-items-center py-2">
                                    <li class="page-item">
                                        <a class="page-link border-right rounded-0 text-gray-5" href="#" aria-label="Previous">
                                            <i class="flaticon-left-direction-arrow font-size-10 font-weight-bold"></i>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link font-size-14" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link font-size-14 active" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link font-size-14" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link font-size-14" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link font-size-14" href="#">5</a></li>
                                    <li class="page-item disabled"><a class="page-link font-size-14" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link font-size-14" href="#">66</a></li>
                                    <li class="page-item"><a class="page-link font-size-14" href="#">67</a></li>
                                    <li class="page-item">
                                        <a class="page-link border-left rounded-0 text-gray-5" href="#" aria-label="Next">
                                            <i class="flaticon-right-thin-chevron font-size-10 font-weight-bold"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="tab-pane fade mb-5 mb-xl-0 show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab" data-target-group="groups">
                            <div class="row">
                                <div class="col-md-6 col-xl-4 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 h-100">
                                        <div class="position-relative">
                                            <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="min-height-230 card-img-top" src="assets/img/300x230/img13.jpg">
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
                                                            <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <a href="../activities/activities-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark d-inline-block mb-1">Mangrove Tunnel Kayak Eco Tour</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£350.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 h-100">
                                        <div class="position-relative">
                                            <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="min-height-230 card-img-top" src="assets/img/300x230/img14.jpg">
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
                                                            <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Istanbul, Turkey
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <a href="../activities/activities-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark d-inline-block mb-1">Half-Day Outdoor Rock Climbing Session</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£350.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 h-100">
                                        <div class="position-relative">
                                            <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="min-height-230 card-img-top" src="assets/img/300x230/img15.jpg">
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
                                                            <i class="icon flaticon-placeholder mr-2 font-size-20"></i> New York, United States
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <a href="../activities/activities-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark d-inline-block mb-1">Paramount Ranch Guided Horseback Tour</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£350.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 h-100">
                                        <div class="position-relative">
                                            <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="min-height-230 card-img-top" src="assets/img/300x230/img16.jpg">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                                <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                    <span class="flaticon-heart-1 font-size-20"></span>
                                                </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0">
                                                <div class="px-4 pb-3">
                                                    <a href="../activities/activities-single-v2.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-placeholder mr-2 font-size-20"></i> New South Wales, Australia
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <a href="../activities/activities-single-v2.html" class="card-title font-size-17 font-weight-medium text-dark d-inline-block mb-1">Scuba Diving Charter in Boyton Beach</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£350.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 h-100">
                                        <div class="position-relative">
                                            <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="min-height-230 card-img-top" src="assets/img/300x230/img43.jpg">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                                <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                    <span class="flaticon-heart-1 font-size-20"></span>
                                                </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0">
                                                <div class="px-4 pb-3">
                                                    <a href="../activities/activities-single-v2.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Istanbul, Turkey
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <a href="../activities/activities-single-v2.html" class="card-title font-size-17 font-weight-medium text-dark d-inline-block mb-1">Water Activities at Cenang Beach in Langkawi</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£350.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 h-100">
                                        <div class="position-relative">
                                            <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="min-height-230 card-img-top" src="assets/img/300x230/img44.jpg">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                                <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                    <span class="flaticon-heart-1 font-size-20"></span>
                                                </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0">
                                                <div class="px-4 pb-3">
                                                    <a href="../activities/activities-single-v2.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-placeholder mr-2 font-size-20"></i> New York, United States
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <a href="../activities/activities-single-v2.html" class="card-title font-size-17 font-weight-medium text-dark d-inline-block mb-1">Banana Boat Activity in Boracay</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£350.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 h-100">
                                        <div class="position-relative">
                                            <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="min-height-230 card-img-top" src="assets/img/300x230/img45.jpg">
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
                                                            <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <a href="../activities/activities-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark d-inline-block mb-1">Fitzroy Island Day Tour & Water Activities</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£350.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 h-100">
                                        <div class="position-relative">
                                            <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="min-height-230 card-img-top" src="assets/img/300x230/img46.jpg">
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
                                                            <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Istanbul, Turkey
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <a href="../activities/activities-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark d-inline-block mb-1">Pawna Lake Overnight Camping & Day Adventure Activities</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£350.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 h-100">
                                        <div class="position-relative">
                                            <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="min-height-230 card-img-top" src="assets/img/300x230/img47.jpg">
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
                                                            <i class="icon flaticon-placeholder mr-2 font-size-20"></i> New York, United States
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <a href="../activities/activities-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark d-inline-block mb-1">Phuket Private Trip with Outdoor Activities</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£350.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 h-100">
                                        <div class="position-relative">
                                            <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="min-height-230 card-img-top" src="assets/img/300x230/img16.jpg">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                                <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                    <span class="flaticon-heart-1 font-size-20"></span>
                                                </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0">
                                                <div class="px-4 pb-3">
                                                    <a href="../activities/activities-single-v2.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-placeholder mr-2 font-size-20"></i> New South Wales, Australia
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <a href="../activities/activities-single-v2.html" class="card-title font-size-17 font-weight-medium text-dark d-inline-block mb-1">Scuba Diving Charter in Boyton Beach</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£350.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 h-100">
                                        <div class="position-relative">
                                            <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="min-height-230 card-img-top" src="assets/img/300x230/img14.jpg">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                                <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                    <span class="flaticon-heart-1 font-size-20"></span>
                                                </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0">
                                                <div class="px-4 pb-3">
                                                    <a href="../activities/activities-single-v2.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Istanbul, Turkey
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <a href="../activities/activities-single-v2.html" class="card-title font-size-17 font-weight-medium text-dark d-inline-block mb-1">Half-Day Outdoor Rock Climbing Session</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£350.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 h-100">
                                        <div class="position-relative">
                                            <a href="../activities/activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="min-height-230 card-img-top" src="assets/img/300x230/img15.jpg">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                                <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                    <span class="flaticon-heart-1 font-size-20"></span>
                                                </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0">
                                                <div class="px-4 pb-3">
                                                    <a href="../activities/activities-single-v2.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-placeholder mr-2 font-size-20"></i> New York, United States
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <a href="../activities/activities-single-v2.html" class="card-title font-size-17 font-weight-medium text-dark d-inline-block mb-1">Paramount Ranch Guided Horseback Tour</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£350.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center text-md-left font-size-14 mb-3 text-lh-1">Showing 1–15</div>
                            <nav aria-label="Page navigation">
                                <ul class="list-pagination-1 pagination border border-color-4 rounded-sm mb-5 mb-lg-0 overflow-auto overflow-xl-visible justify-content-md-center align-items-center py-2">
                                    <li class="page-item">
                                        <a class="page-link border-right rounded-0 text-gray-5" href="#" aria-label="Previous">
                                            <i class="flaticon-left-direction-arrow font-size-10 font-weight-bold"></i>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link font-size-14" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link font-size-14 active" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link font-size-14" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link font-size-14" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link font-size-14" href="#">5</a></li>
                                    <li class="page-item disabled"><a class="page-link font-size-14" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link font-size-14" href="#">66</a></li>
                                    <li class="page-item"><a class="page-link font-size-14" href="#">67</a></li>
                                    <li class="page-item">
                                        <a class="page-link border-left rounded-0 text-gray-5" href="#" aria-label="Next">
                                            <i class="flaticon-right-thin-chevron font-size-10 font-weight-bold"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- End Tab Content -->
                </div>
                <!-- Slick Tab carousel -->
            </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')
@endsection