<!-- JS Global Compulsory -->
<script src="assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
<script src="assets/vendor/popper.js/dist/umd/popper.min.js"></script>
<script src="assets/vendor/bootstrap/bootstrap.min.js"></script>

<!-- JS Implementing Plugins -->
<script src="assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
<script src="assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="assets/vendor/flatpickr/dist/flatpickr.min.js"></script>
<script src="assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="assets/vendor/slick-carousel/slick/slick.js"></script>
<script src="assets/vendor/fancybox/jquery.fancybox.min.js"></script>
<script src="assets/vendor/svg-injector/dist/svg-injector.min.js"></script>

<!-- JS MyTravel -->
<script src="assets/js/hs.core.js"></script>
<script src="assets/js/components/hs.header.js"></script>
<script src="assets/js/components/hs.unfold.js"></script>
<script src="assets/js/components/hs.validation.js"></script>
<script src="assets/js/components/hs.show-animation.js"></script>
<script src="assets/js/components/hs.range-datepicker.js"></script>
<script src="assets/js/components/hs.selectpicker.js"></script>
<script src="assets/js/components/hs.go-to.js"></script>
<script src="assets/js/components/hs.slick-carousel.js"></script>
<script src="assets/js/components/hs.fancybox.js"></script>
<script src="assets/js/components/hs.svg-injector.js"></script>
<script src="assets/js/components/hs.quantity-counter.js"></script>

<!-- Note: when deploying, replace "development.js" with "production.min.js". -->
<!-- <script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
<script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script> -->

<!-- <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script> -->

<script src="https://www.jsviews.com/download/jsrender.js"></script>

<script src="assets/js/app.js"></script>

<!-- StripeJS -->
<script src="https://js.stripe.com/v3/"></script>


<!-- JS Plugins Init. -->
<script>
    $(window).on('load', function() {
        // initialization of HSMegaMenu component
        $('.js-mega-menu').HSMegaMenu({
            event: 'hover',
            pageContainer: $('.container'),
            breakpoint: 1199.98,
            hideTimeOut: 0
        });

        // initialization of svg injector module
        $.HSCore.components.HSSVGIngector.init('.js-svg-injector');

        // Page preloader
        setTimeout(function() {
            $('#jsPreloader').fadeOut(500)
        }, 800);
    });

    $(document).on('ready', function() {
        // initialization of header
        $.HSCore.components.HSHeader.init($('#header'));

        // initialization of unfold component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

        // initialization of show animations
        $.HSCore.components.HSShowAnimation.init('.js-animation-link');

        // initialization of datepicker
        $.HSCore.components.HSRangeDatepicker.init('.js-range-datepicker');

        // initialization of select
        $.HSCore.components.HSSelectPicker.init('.js-select');

        // initialization of quantity counter
        $.HSCore.components.HSQantityCounter.init('.js-quantity');

        // initialization of slick carousel
        $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

        // initialization of popups
        $.HSCore.components.HSFancyBox.init('.js-fancybox');

        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');
    });
</script>


<script id="tpl_cart_items" type="text/x-jsrender">
    <div class="card-body p-0">
    <div class="px-2 px-md-3 py-2 py-md-1 border-bottom border-color-8">
        <div class="media p-2 p-md-3">
            <div class="media-body position-relative pl-md-1">
                <div class="d-flex justify-content-between align-items-start mb-2 mb-md-3">
                    <span class="d-block text-dark font-weight-bold">
                        @{{:title}}
                    </span>
                    <!-- <button type="button" class="close close-rounded position-md-absolute right-0 ml-2" aria-label="Close">
                        <i class="fas fa-trash"></i>
                    </button> -->
                </div>
                <span class="d-block text-gray-1">Price: S$@{{:price}}</span>
                <span class="d-block text-gray-1">Quantity: @{{:quantity}}</span>
            </div>
        </div>
    </div>
</div>
</script>

<script id="tpl_cart_checkout" type="text/x-jsrender">
    <div class="card-footer border-0 p-3 px-md-5 py-md-4">
    <div class="mb-4 pb-md-1">
        <span class="d-block font-weight-semi-bold">Subtotal: S$@{{:total_price}}</span>
    </div>
    <div class="d-md-flex button-inline-group-md mb-1">
        <a class="btn btn-block btn-md btn-gray-1 rounded-xs font-weight-bold transition-3d-hover" href="{{ route('payment.checkout') }}">
            View cart
        </a>
        <a class="btn btn-block btn-md btn-blue-1 rounded-xs font-weight-bold transition-3d-hover mt-md-0 ml-md-5" href="{{ route('payment.checkout') }}">
            Checkout
        </a>
    </div>
</div>
</script>

<script type="text/javascript">
    $(document).on('ready', function() {
        var apiUrl = "http://localhost";

        $.ajax({
            method: 'GET',
            url: apiUrl + ":5002/orders/cart/2",
            success: function(response) {
                var tpl_cart_items = $.templates('#tpl_cart_items');
                var tpl_cart_checkout = $.templates('#tpl_cart_checkout');

                $.each(response.items, function(i, item) {
                    $('#cart_items').append(tpl_cart_items.render(item));
                });

                $('#cart_checkout').append(tpl_cart_checkout.render(response));
            },
            error: function(error) {
                console.log("Error retrieving cart items.", error);
            }
        });
    });
</script>