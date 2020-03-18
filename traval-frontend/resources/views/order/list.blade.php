@extends('partials.master')

@section('title')
My Order @stop

@section('styles')
@endsection

@section('content')
<main id="content" role="main" class="pt-6 pt-xl-10">
    <div class="container">
        <div class="row mb-8">

            <div class="col-lg-12 pb-5 pb-lg-0">
                <!--  order-md-1 order-lg-2 -->
                <!-- Shop-control-bar Title -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="font-size-21 font-weight-bold mb-0 text-lh-1">
                        My orders
                    </h3>

                </div>

                <div class="u-slick__tab">
                    <!-- Tab Content -->
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade mb-5 mb-xl-0 show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab" data-target-group="groups">
                            <div class="row" id="search_results">
                                <div class="col-md-12">
                                    <div class="card bg-light mb-3">
                                        <div class="card-header">Order Id: @{{:id}}</div>
                                        <div class="card-body">
                                            <h5 class="card-title">@{{:title}}</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <a href="#" class="btn btn-primary active" role="button" aria-pressed="true">View voucher</a>

                                        </div>
                                    </div>
                                </div>
                            </div>

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
                url: apiUrl + ':5004/catalog_items/search/' + q,
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