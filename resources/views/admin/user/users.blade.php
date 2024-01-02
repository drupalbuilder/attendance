@extends('admin.layouts.main')
@section('title', 'Users List')
@section('dynamic_css_link')
<link href="{{ asset('css/lib/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<style>
           th.display {
    pointer-events: none;
}
           </style>
@endsection
@section('content')
	<div class="container-fluid">
       <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 w-600">Users List</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
      </div>

       <!-- DataTales Example
       <div class="card shadow mb-4">
      <div class="card-body w-50">
      <form id="filter-form" method="get" action="">
        <div class="row">
          <div class="col">
            
            <div class="form-group">
              <input type="text" id="search"  name="search" value="" class="form-control"  placeholder="Search">
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <button class="btn btn-primary" type="submit" id="btn-submit">Submit</button>
              <a class="btn btn-primary btn-secondary ml-3" href="/admin/users" type="submit" >Reset</a>
            </div>
          </div>
          <div class="col float-left">
            <div class="form-group">
              
            </div>
          </div>
          </div>
        </form>
        </div>
      </div> -->
       <!-- DataTales Example -->
       <div class="card shadow mb-4">
      <div class="card-body w-50 ">
      <form id="filter-form" method="get" action="">
        <div class="row">
          <div class="col">
            
            <div class="form-group">
              <input type="text" id="search"  name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}
                
              ?>"
              
          class="form-control"  placeholder="Search">
            </div>
          </div>
           <div class="col">
            <div class="form-group">
              <button class="btn btn-primary" type="submit" id="btn-submit">Submit</button>
              <a class="btn btn-primary ml-3 btn-secondary" href="/admin/users" type="reset" >Reset</a>
                </div>
                </div>
                <div class="col- 6">
                <div class="form-group">
              
            </div>
           </div>
          </div>
        </form>
        </div>
      </div>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        @if (session('success'))
          <div class="alert alert-success" role="alert">
              {{ session('success') }}
          </div>
        @endif
        <div class="card-body">
        
        @if(($users->currentPage() * $users->perPage()) > $users->total())
        @if($users->total() > 0)
            <h5 class="show-result-box font-weight-bold">Showing {{($users->currentPage()-1) * $users->perPage() + 1}} to {{$users->total()}} of {{$users->total()}} results</h5>
          @else
          <h5 class="show-result-box font-weight-bold">No results</h5>
          @endif
          @else
          <h5 class="show-result-box font-weight-bold">Showing {{($users->currentPage()-1) * $users->perPage() + 1}} to {{$users->currentPage() * $users->perPage()}} of {{$users->total()}} results</h5>
          @endif
          <div class="table-responsive">
          <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th class="display" width="22">#</th>
                  <th sortby="name">Name</th>
                  <th sortby="email">Email</th>
				  <th sortby="email">Role</th>
                  <th sortby="status">Status</th>
                  <th class="text-center display">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php $i = 1; $skipped = ($users->currentPage()-1) * $users->perPage(); ?>
                @forelse($users as $user)
                  <tr>
                    <td>{{ $skipped + $i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
					<td>@php 
					
					$role = json_decode($user->role); 
					echo ucfirst($role->role); 
					@endphp
					</td>
                    <td>{{ $user->status ? 'Active' : 'Inactive' }}</td>
                    <td class="text-center">
                      <!-- <a class="p-r-2 hover-none" href="{{ url('admin/user/view/' . $user->id) }}" title="View">
                        <i class="fa fa-lg fa-eye" aria-hidden="true"></i>
                      </a> -->
                      <a class="p-r-2 hover-none" href="{{ url('admin/user/edit/' . $user->id) }}" title="Edit">
                        <i class="fa fa-lg fa-edit" aria-hidden="true"></i>
                      </a>
                      <a class="p-r-2 hover-none" href="{{ url('admin/user/password-edit/' . $user->id) }}" title="Update Password">
                        <i class="fa fa-key" aria-hidden="true"></i>
                      </a>                  
                    </td>
                  </tr>
                  <?php $i++; ?>
                @empty
                  <tr>
                    <td colspan="6">No User records found!</td>
                  </tr>
                @endforelse
              </tbody>
              <tfoot>
              <tr><td class="pagination-t-f" colspan="6">{{ $users->render("pagination::simple-bootstrap-4") }}</td></tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
  </div>
@endsection
@section('custom_script_js')
  

<!-- Page level plugins -->
<script src="{{ asset('js/lib/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/lib/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('js/lib/datatables-demo.js') }}"></script>
<script>
$( document ).ready(function() {
  $('#search').val("{{$paramdata['search']}}");

  setTimeout(function(){ setValue(); }, 500);
});

// Table Sorting JS
$('#dataTable thead').on( 'click', 'th', function () {
 
 if($('.sorting_asc').attr('aria-sort') == 'ascending')
 {
    var sortby = $('.sorting_asc').attr('sortby');
    var orderby = $('.sorting_asc').attr('aria-sort');
 }else{
    var sortby = $('.sorting_desc').attr('sortby');
    var orderby = $('.sorting_desc').attr('aria-sort');
 }

var currentUrl = document.URL;
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
if(urlParams.get('page') > 1){
  currentUrl = removeURLParameter(currentUrl, 'page');
}
paramString = currentUrl.split("?");
var flag =0;
if(paramString[1] == undefined){
  var params = [];
}else{
  var params = paramString[1].split("&");
  
  for(var i=0;i<params.length;i++){      
    var key = params[i].split("=");
   
  if(key[0] == 'sortby'){
    key[1] = sortby;
    params[i] = key.join("=");
    flag =1;
  }else if(key[0] == 'orderby'){
    if(key[1] == 'ascending'){
      key[1] = 'descending';
    }else{
      key[1] = orderby;
    }
    params[i] = key.join("=");
  }
}
}

if(flag == 0){
params[params.length] = ['sortby',sortby].join("=");
params[params.length] = ['orderby',orderby].join("=");
}


params = params.join("&");
newurl = [paramString[0],params].join("?");

window.location = newurl;
});

// Remove parameter from Url 
function removeURLParameter(url, parameter) {
  //prefer to use l.search if you have a location/link object
  var urlparts= url.split('?');   
  if (urlparts.length>=2) {

      var prefix= encodeURIComponent(parameter)+'=';
      var pars= urlparts[1].split(/[&;]/g);

      //reverse iteration as may be destructive
      for (var i= pars.length; i-- > 0;) {    
          //idiom for string.startsWith
          if (pars[i].lastIndexOf(prefix, 0) !== -1) {  
              pars.splice(i, 1);
          }
      }

      url= urlparts[0]+'?'+pars.join('&');
      return url;
  } else {
      return url;
  }
}

// Value Set JS in blade
function setValue(){
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
$('thead th:first-child').removeClass('sorting_asc');
$('thead th:last-child').removeClass('sorting');
  $('thead th:first-child').addClass('display');
if(urlParams.get('orderby') == 'ascending'){
  $("thead").find("[sortby='" + urlParams.get('sortby') + "']").removeClass('sorting');
  $("thead").find("[sortby='" + urlParams.get('sortby') + "']").addClass('sorting_asc');
  $("thead").find("[sortby='" + urlParams.get('sortby') + "']").addClass('text-success');
}else{
  $("thead").find("[sortby='" + urlParams.get('sortby') + "']").removeClass('sorting');
  $("thead").find("[sortby='" + urlParams.get('sortby') + "']").addClass('sorting_desc');
  $("thead").find("[sortby='" + urlParams.get('sortby') + "']").addClass('text-success');
}
}

</script>
@endsection