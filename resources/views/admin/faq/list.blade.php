@extends('admin.layouts.main')
@section('dynamic_css_link')
@section('title', 'Faq')

<!-- Define the content section -->
@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800 w-600">FAQ</h1>
    </div>

    <div class="card shadow mb-4">
      <div class="card-body w-100 ">
        <form id="filter-form" method="get" action="">
          <div class="row">

            <div class="col-md-4 ">
              <div class="form-group">
                <input type="text" id="search" name="search" value="<?php if (isset($_GET['search'])) {
                                                                      echo $_GET['search'];
                                                                    }

                                                                    ?>" class="form-control" placeholder="Search">
              </div>
            </div>

            <div class="col-md-8">
              <div class="form-group">
                <div class="row">
                  <div class="col-lg-6">
                    <select name="category_filter" id="category_filter" class="form-control">
                      <option value="">Category</option>
                      @foreach($categories as $k => $category)
                      <option value="{{ $k }}">{{ $category[0] }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-lg-6">
                    <button class="btn btn-primary" type="submit" id="btn-submit">Submit</button>
                    <a class="btn btn-primary ml-3 btn-secondary" href="/admin/faq/list" type="reset">Reset</a>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </form>
      </div>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card shadow mb-4">
            <div class="card-body">
                <!-- Display the faq table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th class="bg-primary" style="width:5%">#</th>
                            <th class="bg-primary" style="width:65%">Question</th>
                           <!-- <th class="bg-primary" style="width:30%">Answer</th> -->
                            <th class="bg-primary" style="width:10%">Status</th>
                            <th class="bg-primary" style="width:10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $serialNumber = 1;
                        @endphp
                        @foreach($datalist as $rows)
                        <tr>
                            <td>{{ $serialNumber++ }}</td>
                            <td>{{ $rows->question }}</td>
                         <!--   <td>{{ $rows->answer }}</td>  -->
                            <td><?php $status = "InActive"; if($rows->status){  $status = "Active"; } echo $status; ?></td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu   text-center " section="faq" rel="<?php echo $rows->id; ?>" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">View</a>
                                <a class="dropdown-item py-2" href="{{ url('admin/faq/edit/' . $rows->id) }}">Edit</a>

                               
								<?php
								 if(!$rows->status){ 
								 ?>
                                <a class="dropdown-item py-2 actionmodel" href="/admin/faq/action/2/{{$rows->id}}"  rel="activate" data-toggle="modal" data-target="#actionmodel">Activate</a>
								 <?php } else { ?>
                                <a class="dropdown-item py-2 actionmodel" href="/admin/faq/action/3/{{ $rows->id}}"  rel="deactivate" data-toggle="modal" data-target="#actionmodel">De-Activate</a>
								 <?php } ?>
								<a class="dropdown-item py-2 text-danger actionmodel" href="admin/faq/action/1/{{$rows->id}}" rel="delete" data-toggle="modal" data-target="#actionmodel">Delete</a>
                            </div>
                        </div>
                    </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection