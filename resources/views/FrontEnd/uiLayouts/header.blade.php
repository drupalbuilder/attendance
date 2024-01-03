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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href="{{ asset('css/header.css') }}" rel="stylesheet">
  <link href="{{ asset('css/body.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('/animate.css') }}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<style>
  .dropdown.show .custom-dropdown-menu {
    display: block;
  }


  .custom-dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    text-align: left;
    padding: 0px 5px;
    border: 2px solid #ffffff;
    background: #fff;
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.2);
  }

  .custom-dropdown-menu a {
    font-size: 14px;
    font-weight: normal;
    color: #000;
    margin-bottom: 1px;   
    width: 300px !important;
    white-space: normal;

  }
  .nav-item li a{
    padding: 10px 10px !important;
  }
  
  .nav-item a {
    font-family: "Lexend Deca", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial,
      "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    font-weight: 500;
    transition: background-color 0.3s, color 0.3s;
  }

  .nav-item a:hover {
    background-color: rgba(206, 206, 206, 0.3);
  }

  .nav-link:hover {
    color: #8BADBD !important;
  }

  i {
    transition: all .45s ease;
  }

  i:hover {
    transform: rotateZ(180deg);
  }

  .new:hover i {
    transform: rotateZ(180deg);
  }

  .fa {
    font-size: 14px;
  }

/* new */
.navbar-nav > li > .dropdown-menu {
    display: block;
    opacity: 0;
    transition: ease-out 0.3s;
}
.dropdown:hover .dropdown-menu {
    opacity:1;
}
.dropdown-menu1
{
	border:none;
	display: block;
  opacity:1;
	height: 0px;
	overflow: hidden;
	top: 180px;
	transition: all .3s;
}
.dropdown:hover .dropdown-menu1
{
	display: block;
	top: 100%;
	height: inherit;
}
</style>

<body>

  <div class="page-header">
    <div class="container width_Global">
      <div class="row align-items-center pt-2 mb-2">
        <div class="col text-center text-sm-center text-md-start text-lg-start">
          <div class=""><a href="/"><img class="img-fluid" src="{{ url('images/3dcakeLogo.png') }}" alt=""></a></div>
        </div>
        <div class="col d-none d-md-flex d-lg-flex justify-content-end">
          <div class="text-end">
            <div class="row justify-content-end d-none d-md-flex d-lg-flex">
              <div class="col-auto">
                <h6 class=""><b>Edinburgh:</b> 0131 337 9990</h6>
              </div>
              <div class="col-auto">
                <h6 class=""><b>Glassgow:</b> 0141 378 0027</h6>
              </div>
            </div>
            <div class="">

              <ul class="text-uppercase d-none d-md-flex d-lg-flex justify-content-end">
                <li class="pe-3"><a class="text-decoration-none black" href="/">My Account</a></li>
                <li class="pe-3"><a class="text-decoration-none black" href="/myWishlist">My Wishlist</a></li>

                @if (auth()->check()) <!-- Check if the user is logged in -->
                <li class="">
                  <a class="text-decoration-none black" href="{{ url('logout') }}" data-toggle="modal" data-target="#logoutModal">Log Out</a>
                </li>
                @else
                <li class="">
                  <a class="text-decoration-none black" href="/login">Log In</a>
                </li>
                @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row d-md-none d-lg-none mt-5 px-5">
        <div class="col-6 p-0 text-end">
          <div class="dropdown">
            <button class="btn btn-secondary rounded-0 bg-black dropdown-toggle w-100 menu-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="menu-icon" src="{{ url('images/menu(1).png') }}" alt="">
            </button>
            <ul class="dropdown-menu slider w-75 p-0">
              <li><a class="dropdown-item" href="#">MY ACCOUNT</a></li>
              <li><a class="dropdown-item" href="#">MY WISHLIST</a></li>
              <li><a class="dropdown-item" href="{{ route('login') }}">LOG IN</a></li>
            </ul>
          </div>
        </div>
        <div class="col-6 p-0">
          <div class="dropdown">
            <button class="btn btn-secondary rounded-0 bg-black dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false"><img class="menu-icon1 p-1 " src="{{ url('images/cart.png') }}" alt=""></button>

            <ul class="dropdown-menu  p-0">
              <li class="px-3 py-1"><a class="dropdown-item p-0" href="#">You have no items in your</a>
              </li>
              <li class="px-3 py-1"><a class="dropdown-item p-0" href="#">shopping cart.</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="m-4 d-lg-none d-md-none">
    <input type="text" class="form-control rounded-0" placeholder="Search entire store here..." aria-label="Username" aria-describedby="basic-addon1">
  </div>
  <div class="nav-bar-header">
    <nav class="navbar navbar-expand-lg container width_Global align-items-center">
      <div class="container-fluid">
        <button class="navbar-toggler text-white align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>MENU
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          @php
          $menuData = json_decode(\Illuminate\Support\Facades\Http::get(route('getMenu'))->body(), true);
          @endphp


          <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-lg-center pb-2">
    @foreach ($menuData as $menuItem)
        <li class="mx-2 new nav-item{{ !empty($menuItem['submenu']) ? ' dropdown' : '' }}">
            <a class="nav-link fw-medium text-white active text-decoration-none{{ !empty($menuItem['submenu']) ? '' : '' }}"
                href="{{ $menuItem['link'] }}" data-toggle="{{ !empty($menuItem['submenu']) ? 'dropdown' : '' }}"
                role="button" aria-haspopup="true" aria-expanded="false">
                {{ $menuItem['name'] }}
                @if (!empty($menuItem['submenu']))
                    <span class="caret"></span>
                    <i class="fa fa-angle-down ms-1"></i>
                @endif
            </a>

            @if (!empty($menuItem['submenu']))
                <ul class="custom-dropdown-menu dropdown-menu dropdown-menu1 p-0" style="border: none; border-radius: 0%;">
                    @foreach ($menuItem['submenu'] as $subMenuItem)
                        <li><a class="dropdown-item my-2 mx-3" href="{{ $subMenuItem['link'] }}">{{ $subMenuItem['name'] }}</a></li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>

          <ul class="p-0 w-25">
            <li class="search-input" id="search-input">
              <input class="w-100" type="text" placeholder="Search entire store here...">
            </li>
          </ul>
          <ul class="d-flex">
            <li class="search_button">
            <li id="search-button">
            <li class="search-toggle p-2 px-3" id="search-icon"></li>
            </li>
            <li class="cart_mini_right p-2 ps-3"> (0)
            </li>
            </li>
          </ul>
        </div>

      </div>
    </nav>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script type="text/javascript" src="{{ asset('js/global.js') }}"></script>
  <script>
    $('.dropdown').hover(function() {
      $(this).addClass('show');
    }, function() {
      $(this).removeClass('show');
    });

    $('.dropdown > .nav-link').click(function() {
      window.location.href = $(this).attr('href');
    });
  </script>
</body>
<html>