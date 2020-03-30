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
                            <div class="row" id="orders">
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
<script id="tpl_orders" type="text/x-jsrender">
    <div class="col-md-12">
    <div class="card mb-3">
        <div class="card-header bg-light">
            <div class="d-flex">
                <div>
                    Order ID: @{{:id}}
                </div>
                <div class="ml-auto mr-3">
                    <span class="badge badge-success">Paid</span>
                </div>
            </div>
            <div class="d-flex">
                Total Amount: S$@{{:total_price}}
                <div class="ml-5">
                    On: @{{:datetime}}
                </div>
            </div>
        </div>
        <div class="card-body">
            @{{for items}}
                <h5 class="card-title">@{{:title}}</h5>
                <p class="card-text">
                    Quantity: @{{:quantity}}
                </p>
                <a href="voucher/view/@{{:voucher_guid}}" class="btn btn-primary" role="button">View voucher</a>
                <a href="order/item/@{{:id}}/review" class="btn btn-outline-secondary" role="button">Leave review</a>

                @{{if #index+1 != #get("array").data.length}}
                <hr />
                @{{/if}}
            @{{/for}}
        </div>
    </div>
</div>
</script>

<script type="text/javascript">
    $(document).on('ready', function() {

        if (!localStorage.getItem('token')) {
            window.location.replace('signin');
        } else {
            var userId = localStorage.getItem('user_id');
            $.ajax({
                method: 'GET',
                url: apiUrl + '/api/v1/orders/user/' + userId,
                success: function(data) {
                    var tpl_orders = $.templates('#tpl_orders');
                    $.each(data, function(i, order) {
                        $('#orders').append(tpl_orders.render(order));
                    });
                }
            });
        }
    });
</script>
@endsection