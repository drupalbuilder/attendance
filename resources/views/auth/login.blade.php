@extends('admin.layouts.main')
@section('title', 'Login')
@section('content')
<div class="container-fluid h-100">
  <!-- Outer Row -->
  <div class="row justify-content-center h-100">
    <div class="col-xl-4 col-lg-6 col-md-6 h-100 alignmid">
      <div class="card border-0 shadow-lg my-5" style="overflow:hidden;">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row" style="height: 33rem;">
            <div class="col-xl-12 col-lg-12 col-md-12 ">
              <!--col-lg-6-->
              <div class="p-3 mt-4">
                <div class="d-flex justify-content-center mb-3">
                  <img class="w-25 my-2" src="images/3dcakeLogo.png" alt="...">
                </div>

                <div class="text-center">
                  <h2 class="d-flex justify-content-center fw-bold text-gray-900 mb-1">Sign in</h2>
                  <p class="text-dark">Enter your credentials to get started !!</p>
                </div>
                
                
                 @foreach($errors->all() as $error)
                      <div class="alert alert-danger">
                        {{$error}}
                      </div>
                    @endforeach
                    <form class="user mb-3 d-flex flex-column align-items-center" action="{{url('login')}}" id="login-form" method="post">
                      @csrf
                      
                  <div class="form-group w-75">
                    <div class="form-group">
                      <input type="email" class="w-100 shadow form-control form-control-user rounded" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="w-100 shadow form-control form-control-user rounded" name="password" placeholder="Password">
                    </div>
                    <div class="d-flex justify-content-start mb-4 w-75" style="font-size: .9em;">
                      <a class="text-primary" style="font-size: .9em;" href="/forgot-pass">Forgot your credentials?</a>
                    </div>
                    <div class="form-group d-flex justify-content-center">
                      <input type="hidden" name="status" value="1">
                      <button type="submit" class="btn btn-primary btn-user btn-block rounded">Login</button>
                    </div>
                  </div>

                  <div class="d-flex justify-content-center align-items-center">
                    <div class="col-8 p-0">
                      <hr class="float-end" width="90%">
                    </div>
                    <div class="col-auto text-secondary"><span class="mt-5 span">© 3D Cakes. All Rights Reserved.</span></div>
                    <div class="col-8 p-0">
                      <hr class="mb-3" width="90%">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection