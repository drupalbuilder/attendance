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
        <div class="row px-5">
            <h3 class="ps-0 text-uppercase">Birthday Party & Cakes</h3>
            <h5 class="ps-0 pb-2 text-uppercase text-secondary">Edinburgh | Glasgow | Scotland</h5>
            <div class="col-md-12 col-lg-4 mt-3 mt-lg-0 pe-lg-4 p-md-0 p-sm-0 p-0">
                <div class="card w-100 h-100">
                    <a href="#"><img src="{{ url('images/Book-a-free-consultation.jpg') }}" class="card-img-top h-100" alt="..."></a>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 mt-3 mt-lg-0 pe-lg-4 p-md-0 p-sm-0 p-0">
                <div class="card w-100 h-100">
                    <a href="#"></a><img src="{{ url('images/3D_BOX_-_why-choose-3d-cakes.jpg') }}" class="card-img-top" alt="..."></a>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 mt-3 mt-lg-0 pe-lg-4 p-md-0 p-sm-0 p-0">
                <div class="card w-100 h-100">
                    <a href="#"></a><img src="{{ url('images/flavour-guide-new.png') }}" class="card-img-top h-100" alt="..."></a>
                </div>
            </div>
            <h4 class="text-center my-4">Choose from our extensive galleries below or let us design you a
                bespoke
                wedding cake.</h4>
        </div>
    
            @foreach ($datalist as $data)
                    <div class="col-12 col-md-4 col-lg-3 mt-3 pe-lg-2 p-md-0 p-sm-0 p-0">
                        <div class="card w-100 h-100">
                            <img class="card-img-top h-100" src="{{ $data->image ? url($data->image) : url('images/default-image.jpg') }}" alt="Category Image">
                            <div class="card-body bg-black py-3">
                                <h6 class="image__description fw-bold text-center" style="text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">
                                    {{ $data->name }}
                                </h6>                               
                            </div>
                        </div>
                    </div>
            @endforeach

        </div>
    </div>

    @include('FrontEnd.uiLayouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/global.js') }}"></script>
</body>

</html>