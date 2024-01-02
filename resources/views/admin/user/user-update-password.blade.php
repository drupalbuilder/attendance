@extends('admin.layouts.main')
@section('title', 'Update Password')
@section('content')
  <div class="container-fluid">
       <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800 w-600">Update Password</h1>
      <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <div class="card shadow mb-4">
      @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
      @endif
          <div class="card-body">
            <form method="POST" action="{{ url('admin/user/password/update') }}">
                @csrf
                @if(!empty($user->id))
                 <input type="hidden" name ="id" value ="{{$user->id}}">     
                @endif
             
                <div class="form-row">
                  <div class="form-group col-md-2 label-user-u">
                    Email: 
                  </div>
                  <div class="form-group col-md-7">
                    <input type="email" name="email" id="email" placeholder="Email" class="form-control" value="{{ !empty($user['email']) ? $user['email'] : ""  }}" required readonly>
                  </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-2 label-user-u">
                  Password: 
                </div>
                <div class="form-group col-md-7">
                  <input type="password" placeholder="Password" class="form-control" name="password" value="" required>
                </div>
              </div>
                <div class="form-row">
                <div class="form-group col-md-2 label-user-u">
                  Confirm Password: 
                </div>
                <div class="form-group col-md-7">
                  <input type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" value="" required>
                </div>
              </div>
          
                <div class="form-row form-feedback-button text-left">
                  <div class="form-group col-md-2">
                    &nbsp;
                  </div>
                  <div class="form-group col-md-7">
                      <button type="submit" name="_submit" class="btn btn-primary py-3">Save</button>                      
                  </div>
              </div>
            </form>
          </div>
    </div>
  </div>
@endsection