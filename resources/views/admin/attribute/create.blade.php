@extends('admin.layouts.main')
@section('title', 'Add Attributes')
@section('content')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800 w-600">Add Attributes</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <div class="card shadow mb-4">
            <div class="card-body">

                <form method="POST" action="{{ url('admin/attribute/save-attribute') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-2 label-user-u">
                            Name:
                        </div>
                        <div class="form-group col-md-7">
                            <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ old('name') }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2 label-user-u">
                            Type:
                        </div>
                        <div class="form-group col-md-7">

                            <select name="type" class="form-control">
                                <option value="">Select The Type</option>
                                <option value="select">Select</option>
                                <option value="checkbox">Checkbox</option>
                                <option value="radiobox">Radiobox</option>
                                <option value="text">Text</option>
                                <!-- Add other types as needed -->
                            </select>                           

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2 label-user-u">
                            SKU:
                        </div>
                        <div class="form-group col-md-7">
                            <input type="text" name="sku" id="sku" placeholder="Sku" class="form-control" value="{{ old('sku') }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2 label-user-u">
                            Stock:
                        </div>
                        <div class="form-group col-md-7">
                            <input type="text" name="stock" id="stock" placeholder="Stock" class="form-control" value="{{ old('stock') }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2 label-user-u">
                            Status:
                        </div>
                        <div class="form-group col-md-4">
                            <input type="radio" id="active" name="status" value="1" checked>
                            <label for="active">Active</label>
                            <input type="radio" id="inactive" name="status" value="0">
                            <label for="inactive">Disabled</label>
                        </div>
                    </div>
                    <div class="form-row form-feedback-button text-left">
                        <div class="form-group col-md-2">
                            &nbsp;
                        </div>
                        <div class="form-group col-md-7">
                            <button type="submit" name="submit" class="btn btn-primary py-2">Save</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection