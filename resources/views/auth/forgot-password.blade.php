@extends('admin.layouts.main')
@section('title', 'Forgot Password')
@section('content')
<div class="container-fluid h-100">
  <!-- Outer Row -->
  <div class="row justify-content-center h-100">
    <div class="col-xl-4 col-lg-6 col-md-6 h-100 alignmid">
      <div class="card border-0 shadow-lg my-5" style="overflow:hidden;">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row" style="height:33rem;">

            <div class="col-xl-12 col-lg-12 col-md-12 pt-3">
              <!--col-lg-6-->
              <div class="p-3 mt-4">
                <div class="d-flex justify-content-center mb-3">
                  <img class="w-25 my-2" src="images/3dcakeLogo.png" alt="...">
                </div>
                <div class="text-center">
                  <h2 class="d-flex justify-content-center fw-bold text-gray-900 mb-2">Forgot Password?</h2>
                  <p class="text-dark">Enter your email to reset your password.</p>
                </div>
                <form action="{{url('login')}}" id="forgot-password-form" method="post">
                  @csrf
                  <!--@csrf-->
                  <!--@foreach($errors->all() as $error)-->
                  <!--<div class="alert alert-danger">-->
                  <!--  {{$error}}-->
                  <!--</div>-->
                  <!--@endforeach-->
                  @csrf
                  <div class="form-group w-75 mx-auto">
                    @if($errors->any())
                    <div class="alert alert-danger">
                      @foreach($errors->all() as $error)
                      <div class="mb-2">{{$error}}</div>
                      @endforeach
                    </div>
                    @endif


                    <div class="form-group">
                      <label class="label">Email</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="email" placeholder="Email" />
                      </div>
                    </div>

                    <div class="d-flex justify-content-start mb-4 w-75" style="font-size: .9em;">
                      <a class="text-primary" style="font-size: .9em;" href="/login">back to Login?</a>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary submit-btn btn-block">Submit</button>
                    </div>
                </form>

              </div>
              <div class="d-flex justify-content-center align-items-center m-5">
                <div class="col-8 col-sm-6 col-md-4 p-0">
                  <hr class="float-end" width="90%">
                </div>
                <div class="col-auto text-secondary"><span class="mt-3 mt-sm-5 span text-center">© 3D Cakes. All Rights Reserved.</span></div>
                <div class="col-8 col-md-4 p-0">
                  <hr class="mb-3" width="90%">
                </div>
              </div>


            </div>
          </div>

        </div>

      </div>

    </div>

  </div>


</div>
@endsection

@foreach($errors->all() as $error)
<div class="alert alert-danger">
  {{$error}}
</div>
@endforeach