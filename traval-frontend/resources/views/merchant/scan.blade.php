<!-- HAVEN'T EDIT (copied directly from activity) -->

@extends('partials.master')

@section('title')
Merchant QR Code Scanner @stop

@section('styles')
<style>
    video {
        width: 100% !important;
        height: auto !important;
    }
</style>
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
                        Merchant
                    </h3>
                </div>

                <div class="u-slick__tab">
                    <!-- Tab Content -->
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade mb-5 mb-xl-0 show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab" data-target-group="groups">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="cam-qr-result"></div>
                                    <div id="cam-qr-result-timestamp"></div>
                                </div>
                                <div class="embed-responsive embed-responsive-4by3">
                                    <video id="qr-video" class="embed-responsive-item" muted playsinline></video>
                                </div>
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

<script type="module">
    import QrScanner from "/assets/js/qr-scanner.min.js";
    QrScanner.WORKER_PATH = '/assets/js/qr-scanner-worker.min.js';

    const video = document.getElementById('qr-video');
    const camHasCamera = document.getElementById('cam-has-camera');
    const camQrResult = document.getElementById('cam-qr-result');
    const camQrResultTimestamp = document.getElementById('cam-qr-result-timestamp');
    const fileSelector = document.getElementById('file-selector');
    const fileQrResult = document.getElementById('file-qr-result');

    function setResult(label, result) {
        label.textContent = "Scanned QR code: " + result;
        camQrResultTimestamp.textContent = new Date().toString();
        label.style.color = 'teal';
        clearTimeout(label.highlightTimeout);
        label.highlightTimeout = setTimeout(() => label.style.color = 'inherit', 100);

        window.location.replace("http://192.168.30.10:8080/merchant/redeem/" + result);
    }

    // Scan using phone camera
    QrScanner.hasCamera().then(hasCamera => camHasCamera.textContent = hasCamera);

    const scanner = new QrScanner(video, result => setResult(camQrResult, result));
    scanner.start();

    document.getElementById('inversion-mode-select').addEventListener('change', event => {
        scanner.setInversionMode(event.target.value);
    });
    
    // Scan using file upload
    fileSelector.addEventListener('change', event => {
        const file = fileSelector.files[0];
        if (!file) {
            return;
        }
        QrScanner.scanImage(file)
            .then(result => setResult(fileQrResult, result))
            .catch(e => setResult(fileQrResult, e || 'No QR code found.'));
    });

</script>

<script type="text/javascript">
    var apiUrl = "http://localhost";
    var guid = $(location).attr('pathname').split('/')[3];
    console.log(guid);

    $(document).on('ready', function() {
        $.ajax({
            method: 'GET',
            url: apiUrl + ":5004/vouchers/guid/" + guid,
            success: function(data) {
                var tpl_voucher = $.templates('#tpl_voucher');
                $('#voucher').append(tpl_voucher.render(data));
            }
        });
    });
</script>
@endsection