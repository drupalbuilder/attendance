@extends('admin.layouts.main')
@section('title', 'Product Attribute')
@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800 w-600">Manage Product Attributes - {{ $product->name }}</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="{{ route('admin.product_attribute.save', ['productId' => $product->id]) }}">
                @csrf

                @foreach($attributes as $attribute)
                <div class="form-row">
                    <div class="form-group col-md-2 label-user-u">
                        {{ $attribute->name }}:
                    </div>
                    <div class="form-group col-md-2">
                        <input style="width: 18px; height: 18px;" type="checkbox" name="attributes[]" value="{{ $attribute->id }}" {{ in_array($attribute->id, array_keys($attributeValuesArray)) ? 'checked' : '' }}>
                    </div>
                    <div class="form-group col-md-2">
                        <a href="{{ route('admin.product.showAttributeOptions', ['productId' => $product->id, 'attributeId' => $attribute->id]) }}" class="btn btn-primary">Options</a>
                    </div>
                </div>
                @endforeach


                <button type="submit" class="btn btn-success">Save Attributes</button>
            </form>
        </div>
    </div>
</div>

@endsection