@extends('admin.layouts.main')
@section('dynamic_css_link')
@section('title', 'AppSettings')<!-- Define the content section -->
@section('content')

  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800 w-600">AppSettings </h1>  
    </div>
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
	  
    

        </div>
      </div>
    </div>
  </div>
  @endsection