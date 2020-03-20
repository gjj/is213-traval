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
                                        <form action="{{ route('search') }}">
                                            <span class="d-block text-gray-1  font-weight-normal mb-0 text-left">What do you want to do?</span>
                                            <div class="mb-4">
                                                <div class="input-group border-bottom border-width-2 border-color-1">
                                                    <i class="flaticon-pin-1 d-flex align-items-center mr-2 text-primary font-weight-semi-bold font-size-22"></i>
                                                    <input type="text" name="q" id="q" class="form-control font-weight-bold font-size-16 shadow-none hero-form font-weight-bold border-0 p-0" placeholder="Search by activity, destination or attraction" aria-label="Keyword or title" />
                                                </div>
                                            </div>
                                        </form>
                                        <!-- End Input -->

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary height-60 w-100 font-weight-bold mb-xl-0 mb-lg-1 transition-3d-hover"><i class="flaticon-magnifying-glass mr-2 font-size-17"></i>Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-9 order-md-1 order-lg-2 pb-5 pb-lg-0">
                <!-- Shop-control-bar Title -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="font-size-21 font-weight-bold mb-0 text-lh-1"><span id="search_count">@{{ results_count }}</span> activities found</h3>

                </div>
                <!-- End shop-control-bar Title -->

                <!-- Slick Tab carousel -->
                <div class="u-slick__tab">
                    <!-- Tab Content -->
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade mb-5 mb-xl-0 show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab" data-target-group="groups">
                            <div class="row" id="search_results">
                            </div>
                            <!-- <div class="text-center text-md-left font-size-14 mb-3 text-lh-1">Showing 1–15</div>
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
                                    <li class="page-item disabled"><a class="page-link font-size-14" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link font-size-14" href="#">67</a></li>
                                    <li class="page-item">
                                        <a class="page-link border-left rounded-0 text-gray-5" href="#" aria-label="Next">
                                            <i class="flaticon-right-thin-chevron font-size-10 font-weight-bold"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav> -->
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
<script id="search_results_tpl" type="text/x-jsrender">
    <div class="col-md-6 col-xl-4 mb-3 mb-md-4 pb-1">
        <div class="card transition-3d-hover shadow-hover-2 h-100">
            <div class="position-relative">
                <a href="activity/@{{:id}}" class="d-block gradient-overlay-half-bg-gradient-v5">
                    <img class="min-height-230 card-img-top" src="@{{:photo_urls[0]}}">
                </a>
                <div class="position-absolute bottom-0 left-0 right-0">
                    <div class="px-4 pb-3">
                        <a href="activity/@{{:id}}" class="d-block">
                            <div class="d-flex align-items-center font-size-14 text-white">
                                <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Singapore
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body px-4 py-3">
                <a href="../activities/activities-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark d-inline-block mb-1">
                    @{{:title}}
                </a>
                <div class="mt-2 mb-3">
                    <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">
                        @{{if rating}}
                            @{{:rating}}/5
                        @{{else}}
                            No ratings
                        @{{/if}}
                    </span>
                    <span class="font-size-14 text-gray-1 ml-2">
                        @{{if reviews_count}}
                            (@{{:reviews_count}} reviews)
                        @{{else}}
                            (No reviews)
                        @{{/if}}
                    </span>
                </div>
                <div class="mb-0">
                    <span class="mr-1 font-size-14 text-gray-1">From</span>
                    <span class="font-weight-bold">S$@{{:price}}</span>
                </div>
            </div>
        </div>
    </div>
</script>

<script type="text/javascript">
    $(document).on('ready', function() {
        var apiUrl = "http://localhost";

        var urlParams = new URLSearchParams(window.location.search);

        // If query exists
        if (urlParams.has('q')) {
            var q = urlParams.get('q');

            $.ajax({
                method: 'GET',
                url: apiUrl + ':5001/catalog_items/search/' + q,
                success: function(data) {
                    $('#search_count').text(data.count);

                    var tpl = $.templates('#search_results_tpl');
                    $.each(data.catalog_items, function(i, item) {
                        console.log(item)
                        $('#search_results').append(tpl.render(item));
                    });
                }
            });
        }
    });
</script>
@endsection