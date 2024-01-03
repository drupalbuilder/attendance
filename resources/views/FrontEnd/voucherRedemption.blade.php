<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>3D Cake</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/body.css') }}" rel="stylesheet">
</head>

<style>
    .img {
        width: 99%;
    }

    .img0 {
        padding-left: 110px;
        padding-right: 100px;
    }

    .opa {
        box-shadow: #c9c9c9 0px 0px 3px 1px;
    }

    @media screen and (max-width: 991px) {
        .img0 {
            padding-left: 0px;
            padding-right: 0px;
        }
    }
</style>

<body>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @include('FrontEnd.uiLayouts.header')
    <div class="container">
        <h1>Voucher Redemption</h1>
        <div class="img0 mb-3">
            <img class="img" src="{{ url('images/flavour-samples-banner-with-button.jpg') }}" alt="">
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-5 pe-3 mb-4">
                <img class="w-100 opa" src="{{ url('images/classic-wedding-cake.jpg') }}" alt="">
            </div>
            <div class="col-12 col-lg-5 ps-3 mb-4">
                <img class="w-100 opa" src="{{ url('images/16-cake-voucher-box.png') }}" alt="">
            </div>
            <div class="col-12 col-lg-5 pe-3 mb-4">
                <img class="w-100 opa" src="{{ url('images/Platinum-Wedding-Cake-With-Voucher.jpg') }}" alt="">
            </div>
            <div class="col-12 col-lg-5 ps-3 mb-4">
                <img class="w-100 opa" src="{{ url('images/Style-Yourself-Wedding-Cake-With-Voucher.jpg') }}" alt="">
            </div>
            <div class="col-12 col-lg-5 pe-3 mb-4">
                <img class="w-100 opa" src="{{ url('images/classic-wedding-cake.jpg') }}" alt="">
            </div>
            <div class="col-12 col-lg-5 ps-3 mb-4">
                <img class="w-100 opa" src="{{ url('images/16-cake-voucher-box.png') }}" alt="">
            </div>
            <div class="col-12 col-lg-5 pe-3 mb-4">
                <img class="w-100 opa" src="{{ url('images/Platinum-Wedding-Cake-With-Voucher.jpg') }}" alt="">
            </div>
            <div class="col-12 col-lg-5 ps-3">
                <img class="w-100 opa" src="{{ url('images/Style-Yourself-Wedding-Cake-With-Voucher.jpg') }}" alt="">
            </div>
        </div>
    </div>

    @include('FrontEnd.uiLayouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/global.js') }}"></script>
</body>

</html>