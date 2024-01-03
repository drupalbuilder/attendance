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

<style>
    .hr {
        border-bottom: dotted 1px;
    }

    .hr2 {
        border-bottom: dotted 1px;
        margin-top: 1px;
        color: #777;
    }

    .h6 {
        color: #777;
    }

    .simple{
        border-bottom: solid 1px #aeaeae80;
    }

    .required{
        font-size: 11px;
        color: #DD4B39;
    }

    .star{
        font-size: 18px;
    }

    .hover a:hover{
        color: #777 !important;
        text-decoration: none;
    }
    
    .input1{
        border-color: #aeaeae80 !important;
    }

</style>

<body>

<div class="container mt-5">
        <h3>Login or Create an Account</h3>
        <div class="row my-4">
            <div class="col-lg-6 col-sm-12">
                <h4>New Here?</h4>
                <div class="hr"></div>
                <div class="hr2"></div>
                <h6 class="my-3 h6">Registration is free and easy!</h6>
                <h6 class="h6">Faster checkout</h6>
                <h6 class="h6">Save multiple shipping addresses</h6>
                <h6 class="h6">View and track orders and more</h6>
                <div class="simple"></div>
                <div class="mt-2 hover text-end">
                    <a class="text-black" href="/forgot-pass">Forgot Your Password</a>
                </div>

            </div>

            <div class="col-lg-6 col-sm-12 mt-lg-0 mt-sm-5 mt-5">
                <h4>Already registered?</h4>
                <div class="hr"></div>
                <div class="hr2"></div>
                <h6 class="my-3 h6">If you have an account with us, please log in.</h6>
                <div class="required text-end">
                    <p>* Required Fields</p>
                </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email Address <span class="required star"> *</span></label>
                      <input type="email" class="form-control input1 rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password <span class="required star"> *</span></label>
                      <input type="password" class="form-control input1 rounded-0" id="exampleInputPassword1" required>
                    </div>
                    <div class="my-3 hover">
                        <a class="text-black" href="/forgot-pass">Forgot Your Password?</a>
                    </div>
                    <hr class="h6">
                    <button type="submit" class="btn rounded-0 btn-dark float-end">Login</button>
            </div>
        </div>
    </div>

    @include('FrontEnd.uiLayouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/global.js') }}"></script>
</body>

</html>