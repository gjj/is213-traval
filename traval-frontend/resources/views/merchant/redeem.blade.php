@extends('partials.master')

@section('title')
Search @stop

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
                        Voucher Redemption
                    </h3>

                </div>

                <div class="u-slick__tab">
                    <!-- Tab Content -->
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade mb-5 mb-xl-0 show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab" data-target-group="groups">
                            <div class="row" id="voucher">
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
<script id="tpl_voucher" type="text/x-jsrender">
<div class="col-md-12">
    <div class="card mb-3">
        <div class="card-header bg-light">
            <div class="d-flex">
                <div>
                    Order ID: @{{:id}}
                </div>
                <div class="ml-auto mr-3">
                    <span class="badge badge-primary">@{{:status}}</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title">@{{:title}}</h5>
            <p class="card-text">
                Quantity: @{{:quantity}}
            </p>
        </div>
        <div class="card-body">
            <a href="#" class="btn btn-success" role="button">Redeem</a>
        </div>
    </div>
</div>
</script>

<script type="text/javascript">
    
    var guid = $(location).attr('pathname').split('/')[3];

    $(document).on('ready', function() {
        $.ajax({
            method: 'GET',
            url: apiUrl + "/api/v1/vouchers/guid/" + guid,
            success: function(data) {
                var tpl_voucher = $.templates('#tpl_voucher');
                $('#voucher').append(tpl_voucher.render(data));
            }
        });
    });
</script>
@endsection