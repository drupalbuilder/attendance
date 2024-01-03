@extends('admin.layouts.main')
@section('dynamic_css_link')
@section('title', 'Page')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800 w-600">Pages</h1>

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
	  
	<!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-body w-50">
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
              <a class="btn btn-primary ml-3 btn-secondary" href="/admin/page/list" type="reset" >Reset</a>
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
      
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
<div class="card shadow mb-4">
      <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th class="bg-primary" style="width:5%">#</th>
                    <th class="bg-primary" style="width:65%">Name</th>
                    <th class="bg-primary" style="width:15%">Status</th>
                    <th class="bg-primary" style="width:15%">Action</th>
                </tr>
            </thead>
            <tbody>
                
				@php 
                    $serialNumber = 1;
                @endphp
                @foreach($datalist as $rows)
                <tr>
                    <td>{{ $serialNumber++ }}</td>
                    <td>{{ $rows->name }}</td>
                                 
                    <td><?php $status = "InActive"; if($rows->status){  $status = "Active"; } echo $status; ?></td>

                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu   text-center " section="page" rel="<?php echo $rows->id; ?>" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">View</a>
                                <a class="dropdown-item py-2" href="{{ url('admin/page/edit/' . $rows->id) }}">Edit</a>

                               
								<?php
								 if(!$rows->status){ 
								 ?>
                                <a class="dropdown-item py-2 actionmodel" href="/admin/page/action/2/{{$rows->id}}"  rel="activate" data-toggle="modal" data-target="#actionmodel">Activate</a>
								 <?php } else { ?>
                                <a class="dropdown-item py-2 actionmodel" href="/admin/page/action/3/{{ $rows->id}}"  rel="deactivate" data-toggle="modal" data-target="#actionmodel">De-Activate</a>
								 <?php } ?>
								<a class="dropdown-item py-2 text-danger actionmodel" href="admin/page/action/1/{{$rows->id}}" rel="delete" data-toggle="modal" data-target="#actionmodel">Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div> </div>
    </div>

    
@endsection