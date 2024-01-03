@extends('admin.layouts.main')
@section('title', 'Add Product')
@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800 w-600">Add Product</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <div class="card shadow mb-4">
            <div class="card-body">

                <form method="POST" action="{{ url('admin/product/save-product') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-2 label-user-u">
                            Title:
                        </div>
                        <div class="form-group col-md-7">
                            <input type="text" name="name" id="name" placeholder="Title" class="form-control" value="{{ old('name') }}" required>
                        </div>                      
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2 label-user-u">
                            Description:
                        </div>
                        <div class="form-group col-md-7">
                            <textarea name="description" rows=5 id="editor" placeholder="Description" class="form-control ">{{ old('description') }}</textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2 label-user-u">
                            Product Image URL:
                        </div>
                        <div class="form-group col-md-7">
                            <input type="file" name="image" placeholder="Image Url" class="form-control" value="{{ old('image') }}" enctype="multipart/form-data" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2 label-user-u">
                        </div>
                        <div class="form-group col-md-3"><label style="color: #848484;font-size: smaller;">Image Title</label>
                            <input type="text" name="image_title" id="image_title" placeholder="Image Title" class="form-control" value="{{ old('image_title') }}">
                        </div>
                        <div class="form-group  col-md-4"><label style="color: #848484;font-size: smaller;">Image Alt</label>
                            <input type="text" name="image_alt" id="image_alt" placeholder="Image Alt" class="form-control" value="{{ old('image_alt') }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2 label-user-u">

                        </div>

                        <div class="form-group col-md-3"><label style="color: #848484;font-size: smaller;">Price</label>
                            <input type="text" type="number" step="0.01" name="price" id="price" placeholder="price" class="form-control" value="{{ old('price') }}" required>
                        </div>

                        <div class="form-group  col-md-4"><label style="color: #848484;font-size: smaller;">Sell Price</label>
                            <input type="text" type="number" step="0.01" name="sell_price" id="name" placeholder="sell price" class="form-control" value="{{ old('sell_price') }}" required>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2 label-user-u">

                        </div>
                        <div class="form-group col-md-3"><label style="color: #848484;font-size: smaller;">Discount</label>
                            <input type="number" step="0.01" name="discount" id="discount" placeholder="Discount" class="form-control" value="{{ old('discount') }}">
                        </div>


                        <div class="form-group  col-md-4"><label style="color: #848484;font-size: smaller;">Shipping Charge</label>
                            <input type="text" name="shipping_charge" id="shipping_charge" placeholder="Shipping Charge" class="form-control" value="{{ old('shipping_charge') }}">
                        </div>

                    </div>



                    <div class="form-row">
                        <div class="form-group col-md-2 label-user-u">
                            Discount Type:
                        </div>
                        <div class="form-group col-md-4">
                            <input type="radio" id="percentage" name="amount_percantage" value="1">
                            <label for="percentage">Percentage</label>

                            <input type="radio" id="fixed" name="amount_percantage" value="0">
                            <label for="fixed">Fixed Amount</label>
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

                    <div class="form-row">
                        <div class="form-group col-md-2 label-user-u">
                            Featured Product:
                        </div>
                        <div class="form-group col-md-4">
                            <input type="checkbox" id="featured_category" name="featured_category" value="1">
                            <label for="featured_category">Featured Product</label>
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