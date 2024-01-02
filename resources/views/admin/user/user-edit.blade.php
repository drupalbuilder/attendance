@extends('admin.layouts.main')
@section('title', 'Edit User')
@section('content')
<div class="container-fluid">
     <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800 w-600">Edit User</h1>
      <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
      @endif
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
            <form method="POST" action="{{ url('admin/user/update') }}">
                @csrf
                @if(!empty($user->id))
                 <input type="hidden" name ="id" value ="{{$user->id}}">     
                @endif
                <div class="form-row">
                  <div class="form-group col-md-2 label-user-u">
                    Name: 
                  </div>
                  <div class="form-group col-md-7">
                    <input type="text" placeholder="Full Name" name="name" id="name" class="form-control" value="{{ !empty($user['name']) ? $user['name'] : ""  }}" required>
                  </div>
                </div>
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
                    Roles: 
                  </div>
                  <div class="form-group col-md-4">
                    @foreach($roles as $role)
                        <div class="radio d-inline-block">
                            <label class="f-style text-capitalize"><input type="radio" name="role_id" value="{{ $role->id }}" {{!empty($user['role_id']) && $user['role_id'] == $role->id ? 'checked' : ''}}> {{ $role->role }}</label>
                        </div>
                    @endforeach
                  </div>
                  <div class="form-group col-md-1 label-user-u">
                    Status: 
                  </div>
                  <div class="form-group col-md-4">
                    <input type="radio" id="active" name="status" value="1" {{!empty($user['status']) && $user['status'] == 1 ? 'checked' : ''}}>
                    <label for="active">Active</label>
                    <input type="radio" id="inactive" name="status" value="0" {{!empty($user['status']) && $user['status'] == 0 ? 'checked' : ''}}>
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