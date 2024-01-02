@extends('admin.layouts.main')
@section('title', 'Add New User')
@section('content')
<div class="container-fluid">
     <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800 w-600">Add New User</h1>
      <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      @if ($errors->any())
          <div class="alert alert-danger" id="verr">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
        <div class="card-body">
          <form method="POST" action="{{ url('admin/user/save-user') }}">
		          @csrf     
              <div class="form-row">
                <div class="form-group col-md-2 label-user-u">
                  Name: 
                </div>
                <div class="form-group col-md-7">
                  <input type="text" placeholder="Full Name" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-2 label-user-u">
                  Email: 
                </div>
                <div class="form-group col-md-7">
                  <input type="email" name="email" id="email" placeholder="Email" class="form-control" value="{{ old('email') }}" required>
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
  
              <div class="form-row">
                <div class="form-group col-md-2 label-user-u">
                  Roles: 
                </div>
                <div class="form-group col-md-4">
                  @foreach($roles as $role)
                      <div class="radio d-inline-block">
                          <label class="f-style text-capitalize"><input type="radio" name="role_id" value="{{ $role->id }}"> {{ $role->role }}</label>
                      </div>
                  @endforeach
                </div>
                <div class="form-group col-md-1 label-user-u">
                  Status: 
                </div>
                <div class="form-group">
                  <input type="radio" id="active" name="status" value="1">
                  <label for="active">Active</label>
                  <input type="radio" id="inactive" name="status" value="0">
                  <label for="inactive">InActive</label>
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