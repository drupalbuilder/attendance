@extends('admin.layouts.main')
@section('dynamic_css_link')
@section('title', ' Category')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800 w-600"> Category</h1>

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
        <div class="card-body w-100">
            <form id="filter-form" method="get" action="{{ url()->current() }}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" id="search" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <div class="row">
                          
                                <div class="col-lg-6">
                                    <button class="btn btn-primary" type="submit" id="btn-submit">Submit</button>
                                    <a class="btn btn-secondary ml-3" href="{{ url('admin/blockcategory/list') }}" type="reset">Reset</a>
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
                <table class="table">
                    <thead>
                        <tr>
                            <th class="bg-primary" style="width:5%">#</th>
                            <th class="bg-primary" style="width:65%">Name</th>
                            <th class="bg-primary" style="width:15%">Image</th>
                            <th class="bg-primary" style="width:15%">Featured</th>
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
                            
                            <td>
                                @if ($rows->image)
                                <img src="{{ asset($rows->image) }}" alt="Image" width="50">
                                @endif
                            </td>
                            <td><?php $featured_category = "NO";
if ($rows->featured_category) {
    $featured_category = "YES";
}
echo $featured_category;?></td>
                            <td><?php $status = "InActive";
if ($rows->status) {
    $status = "Active";
}
echo $status;?></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu   text-center " section="blockcategory" rel="<?php echo $rows->id; ?>" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">View</a>
                                        <a class="dropdown-item py-2" href="{{ url('admin/blockcategory/edit/' . $rows->id) }}">Edit</a>


                                        <?php
if (!$rows->status) {
    ?>
                                            <a class="dropdown-item py-2 actionmodel" href="/admin/blockcategory/action/2/{{$rows->id}}" rel="activate" data-toggle="modal" data-target="#actionmodel">Activate</a>
                                        <?php } else {?>
                                            <a class="dropdown-item py-2 actionmodel" href="/admin/blockcategory/action/3/{{ $rows->id}}" rel="deactivate" data-toggle="modal" data-target="#actionmodel">De-Activate</a>
                                        <?php }?>
                                        <a class="dropdown-item py-2 text-danger actionmodel" href="admin/blockcategory/action/1/{{$rows->id}}" rel="delete" data-toggle="modal" data-target="#actionmodel">Delete</a>
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