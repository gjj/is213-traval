@extends('partials.master')

@section('title')
Cart @stop

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
                        Cart
                    </h3>

                </div>

                <div class="u-slick__tab">
                    <!-- Tab Content -->
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade mb-5 mb-xl-0 show active" id="pills-one-example1" role="tabpanel"
                            aria-labelledby="pills-one-example1-tab" data-target-group="groups">
                            <div class="row" id="order_results">


                                <!-- Order row 1 -->
                                <div class="card bg-light mb-3">
                                    <div class="card-header">Order Id: @{{:id}}</div>
                                    <div class="card-body">
                                        <h5 class="card-title">@{{:title}}</h5>
                                        <p class="card-text">Some quick example text to build on the card title and
                                            make up the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary active" role="button"
                                            aria-pressed="true">View voucher</a>
                                    </div>
                                </div>

                                <!-- Order row 2 -->
                                <div class="card bg-light mb-3">
                                    <div class="card-header">Order Id: @{{:1}}</div>
                                    <div class="card-body">
                                        <h5 class="card-title">@{{:Gardens by the Bay Ticket in Singapore}}</h5>
                                        <p class="card-text">Some quick example text to build on the card title and
                                            make up the bulk of the card's content.</p>

                                        <div class="container border border-success">
                                            <!-- Header -->
                                            <div class="row mx-md-n5">

                                                <div class="container border border-danger">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <strong></strong>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <strong>Description</strong>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <strong>Price</strong>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <strong>Quantity</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Body -->
                                            <div class="row">
                                                <div class="container border border-warning">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <div class="m_bg m_radius_box rounded">
                                                                <a href="./"
                                                                    class="d-block gradient-overlay-half-bg-gradient-v5">
                                                                    <img class="img-fluid rounded"
                                                                        src="https://res.klook.com/images/fl_lossy.progressive,q_65/c_fill,w_1920,h_720,f_auto/w_80,x_15,y_15,g_south_west,l_klook_water/activities/9658ba79-Gardens-by-the-Bay/GardensbytheBayTicketinSingapore.webp">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            One of three columns
                                                        </div>
                                                        <div class="col-sm-3">
                                                            One of three columns
                                                        </div>
                                                        <div class="col-sm-3">
                                                            One of three columns
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <a href="#" class="btn btn-primary active" role="button"
                                            aria-pressed="true">View voucher</a>
                                    </div>
                                </div>

                                <!-- Order row 3 -->
                                <div class="card bg-light mb-3">
                                    <div class="card-header">Order Id: @{{:1}}</div>
                                    <div class="card-body">
                                        <h5 class="card-title">@{{:Gardens by the Bay Ticket in Singapore}}</h5>
                                        <p class="card-text">Some quick example text to build on the card title
                                            and
                                            make up the bulk of the card's content.</p>

                                        <table class="table border">
                                            <thead>
                                                <tr classs="">
                                                    <th scope="col">Thumbnail</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="col">
                                                        <div class="m_bg m_radius_box">
                                                            <a href="./"
                                                                class="d-block gradient-overlay-half-bg-gradient-v5">
                                                                <img class="img-fluid rounded"
                                                                    src="https://res.klook.com/images/fl_lossy.progressive,q_65/c_fill,w_1920,h_720,f_auto/w_80,x_15,y_15,g_south_west,l_klook_water/activities/9658ba79-Gardens-by-the-Bay/GardensbytheBayTicketinSingapore.webp">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td scope="col">description here</td>
                                                    <td scope="col">2020/03/30</td>
                                                    <td scope="col">4</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <a href="#" class="btn btn-primary active" role="button"
                                            aria-pressed="true">View voucher</a>
                                    </div>
                                </div>

                                <!-- Order row with Laravel -->
                                <div class=>
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
<script id="order_results_tpl" type="text/x-jsrender">
    <div class="card bg-light mb-3">
        <div class="card-header">Order Id: @{{:id}}</div>
        <div class="card-body">
            <h5 class="card-title">@{{:title}}</h5>
            <p class="card-text">@{{:description}}</p>

            <table class="table border">
                <thead>
                    <tr classs="">
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date</th>
                        <th scope="col">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="col">
                            <div class="m_bg m_radius_box">
                                <a href="./"
                                    class="d-block gradient-overlay-half-bg-gradient-v5">
                                    <img class="img-fluid rounded"
                                        src="@{{:photo_urls[0]}}">
                                </a>
                            </div>
                        </td>
                        <td scope="col">description here</td>
                        <td scope="col">@{{:datetime}}</td>
                        <td scope="col">@{{:quantity}}</td>
                    </tr>
                </tbody>
            </table>

            <a href="#" class="btn btn-primary active" role="button"
                aria-pressed="true">View voucher</a>
        </div>
    </div>
</script>

<script type="text/javascript">
$(document).on('ready', function() {
    

    // If query exists
    $.ajax({
        method: 'GET',
        url: apiUrl + '/api/v1/orders',
        success: function(data) {
            console.log(data)
            var tpl = $.templates('#order_results_tpl');

            $.each(data.order_items, function(i, item) {
                console.log(item)
                $('#order_results').append(tpl.render(item));
            });
        }
    });

});
</script>
@endsection