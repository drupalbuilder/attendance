<style>
    .carousel-inner {
        width: 100%;
    }

    .carousel-item {
        width: 100%;
    }

    .carousel-item img {
        width: 100%;
        object-fit: cover;
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

    <div class="slider-body">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
               
                @foreach ($bannerlist as $banner)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }} background{{ $loop->index + 1 }} all-background1">
                    <div class="container width_Global">
                        <div >
                            <img src="{{ $banner->image ? url($banner->image) : url('images/default-banner.jpg') }}" class="d-block" alt="Slider Image">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon rounded-circle " aria-hidden="true" style="background-color: #4e4e4e; width: 4rem; height: 4rem; background-size: 2rem 2rem;"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon rounded-circle " aria-hidden="true" style="background-color: #4e4e4e; width: 4rem; height: 4rem; background-size: 2rem 2rem;"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="cart-body">
        <div class="container">
            <div class="row mt-4">
                @foreach ($datalist as $data)
                <div class="col-xl-4">
                    <div class="image">
                        <img class="image__img img-fluid" src="{{ $data->image ? url($data->image) : url('images/default-image.jpg') }}" alt="Category Image">
                        <div class="image__overlay image__overlay--primary">
                            <h3 class="image__description fw-bold text-secondary text-center" style="text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">
                                {{ $data->name }}
                            </h3>
                            <p class="fw-bold text-secondary text-center" style="text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">{{ $data->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="description-body">
        <div class="black-2 mt-5">
            <div class="container  py-5">
                <h2 class="text-white" style="font-size: 23px;">Welcome to the <span class="cake1">3D Cakes</span></h2>
                <p class="text-white" style="font-size: 12px;line-height: 18px;">Winners of 11 National awards including
                    The
                    Scottish Wedding Awards 2019 Cake Designer
                    Of The
                    Year -
                    South  East Winner and Overall Scotland Winner, David and the team have been honoured to create
                    cakes
                    for HRH The Queen and Prince William as well as fashion brands such as Chanel and Dior. 3D Cakes
                    recently featured on BBC Breakfast show as one of the UK's most decorated cake makers and were
                    labelled
                    "Royal Baker" after completing another show stopping cake for Princes Charles' Commissioning of HMS
                    Princes Of Wales.</p>
                <p class="text-white" style="font-size: 12px;line-height: 18px;">Featured in Vogue Magazine, designing
                    bespoke cakes for Copenhagen Fashion Week, David
                    Duncan’s
                    cutting edge designs have rapidly become some of the most influential in the UK.</p>
                <p class="text-white" style="font-size: 12px;line-height: 18px;">Looking for birthday cake Edinburgh or
                    birthday cake Glasgow? We can create you a WOW
                    factor
                    cake personalised to your requirements. UK wide delivery also available.</p>
                <p class="text-white" style="font-size: 12px;line-height: 18px;">Getting married? Choose from our
                    extensive
                    cake galleries or book one of our design
                    consultations and let our award winning teams create your perfect design. With our no limit approach
                    we
                    can make your dream cake a reality.</p>
                <p class="text-white" style="font-size: 12px;line-height: 18px;">Contact us today to arrange your
                    special
                    occasion cake!</p>
            </div>
        </div>
    </div>

    @include('FrontEnd.uiLayouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/global.js') }}"></script>

</body>