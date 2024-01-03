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
    <link href="{{ asset('css/product.css') }}" rel="stylesheet">
    <link href="{{ asset('css/body.css') }}" rel="stylesheet">

</head>

<body>

    <div class="page-header">
        <div class="container width_Global">
            <div class="row align-items-center pt-2 mb-2">
                <div class="col text-center text-sm-center text-md-start text-lg-start">
                    <div class=""><a href="\"><img class="img-fluid" src="{{ url('images/3dcakeLogo.png') }}" alt=""></a></div>
                </div>
                <div class="col d-none d-md-flex d-lg-flex justify-content-end">
                    <div class="text-end">
                        <div class="row justify-content-end d-none d-md-flex d-lg-flex">
                            <div class="col-auto">
                                <h6 class=""><b>Edinburgh:</b> 0131 337 9990</h6>
                            </div>
                            <div class="col-auto">
                                <h6 class=""><b>Glasgow:</b> 0141 378 0027</h6>
                            </div>
                        </div>
                        <div class="">
                            <ul class="text-uppercase d-none d-md-flex d-lg-flex justify-content-end">
                                <li class="pe-3"><a class="text-decoration-none black" href="/">My Account</a></li>
                                <li class="pe-3"><a class="text-decoration-none black" href="/">My Wishlist</a></li>
                                <li class=""><a class="text-decoration-none black" href="/">Log In</a></li>
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
                            <li><a class="dropdown-item" href="#">LOG IN</a></li>
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
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-lg-center pb-2">
                        <li class="nav-item p-2 px-xl-3 px-2">
                            <a class="nav-link active color text-decoration-none" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item p-2 px-2">
                            <a class="color text-decoration-none" href="{{ route('wedding-cakes-category') }}">Wedding Cakes</a>
                        </li>
                        <li class="nav-item p-2 px-2">
                            <a class="color text-decoration-none" href="/">Birthday & Party Cakes</a>
                        </li>
                        <ul class="nav navbar-nav p-2 px-2">
                            <li class="dropdown">
                                <a class="text-decoration-none color" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Voucher Redemption<span class="caret"></span></a>
                                <ul class="dropdown-menu down">
                                    <li class="px-3 py-3"><a class="text-decoration-none black-colour" href="#">Classic
                                            Wedding Cake Voucher</a>
                                    </li>
                                    <li class="px-3 py-3"><a class="text-decoration-none black-colour" href="#">Choice
                                            Of 16 Wedding Cake
                                            Voucher</a></li>
                                    <li class="px-3 py-3"><a class="text-decoration-none black-colour" href="#">Platinum
                                            Wedding Cake Voucher</a>
                                    </li>
                                    <li class="px-3 py-3"><a class="text-decoration-none black-colour" href="#">Style
                                            Yourself Wedding Cake with
                                            a
                                            voucher</a></li>
                                    <li class="px-3 py-3"><a class="text-decoration-none black-colour" href="#">Order
                                            Petite Celebration Or
                                            Wedding Cake
                                            With A Voucher</a></li>
                                    <li class="px-3 py-3"><a class="text-decoration-none black-colour" href="#">Order
                                            Cupcakes For Collection
                                            With A
                                            Voucher</a></li>
                                    <li class="px-3 py-3"><a class="text-decoration-none black-colour" href="#">Order
                                            Gourmet Layer Cake With A
                                            Voucher</a></li>
                                    <li class="px-3 py-3"><a class="text-decoration-none black-colour" href="#">Order A
                                            Drip Cake With A
                                            Voucher</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav p-2 px-2">
                            <li class="dropdown">
                                <a class="text-decoration-none color" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About Us<span class="caret"></span></a>
                                <ul class="dropdown-menu down">
                                    <li class="px-3 py-1"><a class="text-decoration-none black-colour" href="#">World of
                                            3D Cakes</a></li>
                                    <li class="px-3 py-1"><a class="text-decoration-none black-colour" href="#">Achievements & Awards</a></li>
                                </ul>
                            </li>
                        </ul>
                        <li class="navbar-dropdown p-2 px-2"> <a class="color text-decoration-none" href="#">Contact
                                Us</a> </li>


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

    <div class="container">
        <div class="row">
            <div class="col-3 d-none d-md-inline ">
                <h5 class="text-black pt-4">Categories</h5>
                <hr>
                <div class="" style="gap: 11px;display: grid;">
                    <ul class="ps-0 mb-0">
                        <li class="nav-item py-1">
                            <a class="text-decoration-none text-black "
                                href="http://127.0.0.1:5500/Wedding%20Cakes.html">Wedding
                                Cakes</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-black text-decoration-none" href="#">Birthday & Party Cakes</a>
                        </li>
                    </ul>
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button pluse collapsed p-0" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    Voucher Redemption
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <li style="list-style-type: none;"><a class="dropdown-item black-colour"
                                            href="#">Classic Wedding Cake Voucher</a></li>
                                    <li style="list-style-type: none;"><a class="dropdown-item black-colour"
                                            href="#">Choice Of 16 Wedding Cake <br> Voucher</a></li>
                                    <li style="list-style-type: none;"><a class="dropdown-item black-colour"
                                            href="#">Platinum Wedding Cake <br> Voucher</a></li>
                                    <li style="list-style-type: none;"><a class="dropdown-item black-colour"
                                            href="#">Style Yourself Wedding Cake <br> with a voucher</a>
                                    </li>
                                    <li style="list-style-type: none;"><a class="dropdown-item black-colour"
                                            href="#">Order Petite Celebration Or <br> Wedding Cake With A
                                            Voucher</a></li>
                                    <li style="list-style-type: none;"><a class="dropdown-item black-colour"
                                            href="#">Order Cupcakes For Collection <br> With A Voucher</a>
                                    </li>
                                    <li style="list-style-type: none;"><a class="dropdown-item black-colour"
                                            href="#">Order Gourmet Layer Cake <br> With A Voucher</a></li>
                                    <li style="list-style-type: none;"><a class="dropdown-item black-colour"
                                            href="#">Order A Drip Cake  <br>With A Voucher</a></li>
                                    <li style="list-style-type: none;"><a class="dropdown-item black-colour"
                                            href="#">Something else here</a></li>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button pluse collapsed text-black" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                aria-controls="flush-collapseTwo">
                                About Us
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="ps-0 mb-0">
                                    <li><a class="text-decoration-none black-colour" href="#">World of 3D Cakes</a></li>
                                    <li><a class="text-decoration-none black-colour" href="#">Achievements & Awards</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <a class="text-black  text-decoration-none" href="#">Contact Us</a>
                </div>
                <div class="image_col mt-4"><img class="img-fluid w-100" src="{{ url('images/vows-awards.png') }}"  alt=""></div>
                <div class="image_col mt-4"><img class="img-fluid w-100" src="{{ url('images/personalised-cakes.jpg') }}"  alt="">
                </div>
                <div class="h5 text-black mt-3">Compare Products </div>
                <hr>
                <div class="h6">You have no items to compare.</div>
            </div>
            <div class="col-xl-9 col-md-9 col-sm-12 col-12 col-lg-9">
                <div class="pt-5">
                    <h2 class="text-uppercase text-black">With Sugarcraft Flowers</h2>
                </div>
                <div class="pagenition  border-bottom border-top align-items-center mt-5 row">
                    <div class="item_number  position-relative col-auto">
                        <h6 class="ps-4 mb-0">Items 10 to 18 of 49 total</h6>
                    </div>
                    <div class="col-auto">
                        <span class="sort  ">
                            <label class="option pe-2">Sort By</label>
                            <select class="p-2">
                                <option>Position </option>
                                <option>Name</option>
                                <option>Price</option>
                            </select>
                        </span>
                        <span class="show1 ps-3">
                            <label class="pe-2">Show</label>
                            <select class="p-2">
                                <option>9 </option>
                                <option>15</option>
                                <option>30</option>
                                <option>All</option>
                            </select>
                        </span>
                    </div>
                    <div class="d-flex align-items-center col-auto">
                        <label class="pe-2">Show</label>
                        <span class="mt-3">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="imge_link  mt-sm-3 mt-3"><a class="background_image_link" href=""><img
                                    class="img-fluid image_full" src="{{ url('images/angel_2_2.jpg') }}"  width="340" height="280"
                                    alt="">
                                <div class="text_angle p-1">
                                    <h4 class="text-center mb-0">ANGEL</h4>
                                    <h4 class="text-center">£811</h4>
                                </div>
                            </a></div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="imge_link  mt-sm-3 mt-3"><a class="background_image_link" href=""><img
                                    class="img-fluid image_full" src="{{ url('images/3dcakes-2_1_1.jpg') }}" width="340" height="280"
                                    alt="">
                                <div class="text_angle p-1">
                                    <h4 class="text-center mb-0">ILLUSION</h4>
                                    <h4 class="text-center">£940</h4>
                                </div>
                            </a></div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="imge_link mt-xl-3 mt-md-4 mt-sm-3 mt-3"><a class="background_image_link"
                                href=""><img class="img-fluid image_full" src="{{ url('images/3d_cakes-8218_-_wedding_cake_1.jpg') }}"
                                    width="340" height="280" alt="">
                                <div class="text_angle p-1">
                                    <h4 class="text-center mb-0">BLUSHING BOUQUET </h4>
                                    <h4 class="text-center">£951</h4>
                                </div>
                            </a></div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="imge_link mt-xl-4 mt-md-4  mt-sm-3 mt-3"><a class="background_image_link"
                                href=""><img class="img-fluid image_full" src="{{ url('images/3d_cakes-8218_-_wedding_cake_1.jpg') }}" 
                                    width="340" height="280" alt="">
                                <div class="text_angle p-1">
                                    <h4 class="text-center mb-0">BLUSHING BOUQUET </h4>
                                    <h4 class="text-center">£951</h4>
                                </div>
                            </a></div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="imge_link mt-xl-4 mt-md-4  mt-sm-3 mt-3"><a class="background_image_link"
                                href=""><img class="img-fluid image_full" src="{{ url('images/3d_cakes-8218_-_wedding_cake_1.jpg') }}" 
                                    width="340" height="280" alt="">
                                <div class="text_angle p-1">
                                    <h4 class="text-center mb-0">BLUSHING BOUQUET </h4>
                                    <h4 class="text-center">£951</h4>
                                </div>
                            </a></div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="imge_link mt-xl-4 mt-md-4  mt-sm-3 mt-3"><a class="background_image_link"
                                href=""><img class="img-fluid image_full" src="{{ url('images/3d_cakes-8218_-_wedding_cake_1.jpg') }}" 
                                    width="340" height="280" alt="">
                                <div class="text_angle p-1">
                                    <h4 class="text-center mb-0">BLUSHING BOUQUET </h4>
                                    <h4 class="text-center">£951</h4>
                                </div>
                            </a></div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="imge_link mt-xl-4 mt-md-4  mt-sm-3 mt-3"><a class="background_image_link"
                                href=""><img class="img-fluid image_full" src="{{ url('images/3d_cakes-8218_-_wedding_cake_1.jpg') }}" 
                                    width="340" height="280" alt="">
                                <div class="text_angle p-1">
                                    <h4 class="text-center mb-0">BLUSHING BOUQUET </h4>
                                    <h4 class="text-center">£951</h4>
                                </div>
                            </a></div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="imge_link mt-xl-4 mt-md-4  mt-sm-3 mt-3"><a class="background_image_link"
                                href=""><img class="img-fluid image_full" src="{{ url('images/3d_cakes-8218_-_wedding_cake_1.jpg') }}" 
                                    width="340" height="280" alt="">
                                <div class="text_angle p-1">
                                    <h4 class="text-center mb-0">BLUSHING BOUQUET </h4>
                                    <h4 class="text-center">£951</h4>
                                </div>
                            </a></div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="imge_link mt-xl-4 mt-md-4  mt-sm-3 mt-3"><a class="background_image_link"
                                href=""><img class="img-fluid image_full" src="{{ url('images/3d_cakes-8218_-_wedding_cake_1.jpg') }}" 
                                    width="340" height="280" alt="">
                                <div class="text_angle p-1">
                                    <h4 class="text-center mb-0">BLUSHING BOUQUET </h4>
                                    <h4 class="text-center">£951</h4>
                                </div>
                            </a></div>
                    </div>
                </div>
                <div class="pagenition  border-bottom border-top align-items-center mt-5 row">
                    <div class="item_number  position-relative col-auto">
                        <h6 class="ps-4 mb-0">Items 10 to 18 of 49 total</h6>
                    </div>
                    <div class="col-auto">
                        <span class="sort  ">
                            <label class="option pe-2">Sort By</label>
                            <select class="p-2">
                                <option>Position </option>
                                <option>Name</option>
                                <option>Price</option>
                            </select>
                        </span>
                        <span class="show1 ps-2">
                            <label class="pe-2">Show</label>
                            <select class="p-2">
                                <option>9 </option>
                                <option>15</option>
                                <option>30</option>
                                <option>All</option>
                            </select>
                        </span>
                    </div>
                    <div class="d-flex align-items-center col-auto">
                        <label class="pe-2">Show</label>
                        <span class="mt-3">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/global.js') }}"></script>

</body>
<html>