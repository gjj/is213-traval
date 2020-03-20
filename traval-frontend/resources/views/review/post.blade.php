@extends('partials.master')

@section('title')
Review @stop

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
                        Leave a review
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
    
</script>

<script type="text/javascript">
    $(document).on('ready', function() {
        var apiUrl = "http://localhost";

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
    });
</script>
@endsection