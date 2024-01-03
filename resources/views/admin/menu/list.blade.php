@extends('admin.layouts.main')
@section('title', 'Menu')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-0 text-gray-800 w-600">Menu</h1>
    <div class="card shadow mb-4">
        <div class="card-body w-100">
            <form id="filter-form" method="get" action="">
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
                                    <select name="parent_filter" id="parent_filter" class="form-control">
                                        <option value="">Parent</option>
                                        @foreach($Parent as $k => $parent)
                                        <option value="{{ $k }}">{{ $parent[0] }}</option> 
                                        @endforeach
                                    </select>
									
									
                                </div>

                                <div class="col-lg-6">
                                    <button class="btn btn-primary" type="submit" id="btn-submit">Submit</button>
                                    <a class="btn btn-secondary ml-3" href="{{ url('admin/menu/list') }}" type="reset">Reset</a>
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
                            <th class="bg-primary" style="width:15%">Name</th>
                            <th class="bg-primary" style="width:20%">Parent</th>
                            <th class="bg-primary" style="width:15%">Description</th>
                            <th class="bg-primary" style="width:15%">Link</th>
							<th class="bg-primary" style="width:10%">Weight</th>
                            <th class="bg-primary" style="width:20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $serialNumber = 1;
                        @endphp
                        @foreach($menuList as $rows)
                        <tr>
                            <td>{{ $serialNumber++ }}</td>
                            <td>{{ $rows->name }}</td>
							
                           <td>
    @if($rows->parent === 0)
        {{ 'NULL' }}
    @elseif(isset($Parent[$rows->parent]) && is_array($Parent[$rows->parent]) && count($Parent[$rows->parent]) > 0)
        {{ $Parent[$rows->parent][0] }}
    @else
        {{ 'NULL' }}
    @endif
</td>
                            <td>{{ $rows->description }}</td>
                            <td>{{ $rows->link }}</td>
							<td>{{ $rows->weight }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu   text-center " section="menu" rel="<?php echo $rows->id; ?>" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">View</a>
                                        <a class="dropdown-item py-2" href="{{ url('admin/menu/edit/' . $rows->id) }}">Edit</a>


                                        <?php
                                        if (!$rows->status) {
                                        ?>
                                            <a class="dropdown-item py-2 actionmodel" href="/admin/menu/action/2/{{$rows->id}}" rel="activate" data-toggle="modal" data-target="#actionmodel">Activate</a>
                                        <?php } else { ?>
                                            <a class="dropdown-item py-2 actionmodel" href="/admin/menu/action/3/{{ $rows->id}}" rel="deactivate" data-toggle="modal" data-target="#actionmodel">De-Activate</a>
                                        <?php } ?>
                                        <a class="dropdown-item py-2 text-danger actionmodel" href="admin/menu/action/1/{{$rows->id}}" rel="delete" data-toggle="modal" data-target="#actionmodel">Delete</a>
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