@extends('admin.layouts.main')
@section('title', 'Attribute Options')
@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800 w-600">Attribute Options</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <div class="card shadow mb-4">
            <div class="card-body">

                <form method="POST" action="{{ url('admin/attribute/update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}">

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-row">
                                <div class="form-group col-md-12 label-user-u">
                                    Title:
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="text" name="title" id="title" placeholder="Title" class="form-control" value="{{ $data->title }}" required>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-row">
                                <div class="form-group col-md-12 label-user-u">
                                    Price (optional):
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="text" name="price" id="price" placeholder="Price" class="form-control" value="{{ $data->price }}" required>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-row">
                                <div class="form-group col-md-12 label-user-u">
                                    Weight:
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="text" name="weight" id="weight" placeholder="Weight" class="form-control" value="{{ $data->weight }}" required>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>

        <div class="d-flex justify-content-between px-2">
            <button type="submit" name="submit" class="btn btn-primary py-2">Add More</button>
        </div>

    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <button type="submit" name="submit" class="btn btn-primary py-2">Save</button>
        </div>
    </div>
    
</div>
@endsection