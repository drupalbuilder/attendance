@extends('admin.layouts.main')
@section('title', 'Product Attribute Options')
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800 w-600">Product Attribute Options</h1>
    <div class="card shadow mb-4">
        <div class="card-body">

            <!-- Form for adding options -->
            <form method="POST" action="{{ route('store_attribute_option') }}">
                @csrf
                <input type="hidden" name="product_attribute_id" value="{{ $attributeId }}">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="product_attribute_name" value="{{ $attribute->name }}">

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="option_name">Option Name:</label>
                        <input type="text" name="option_name" id="option_name" class="form-control" required>
                    </div>
                </div>
                <div class="form-row form-feedback-button text-left">
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary py-2">Add Option</button>
                    </div>
                </div>
            </form>

            <!-- Form for saving options -->
            <form method="POST" action="{{ route('save_attribute_options', ['productId' => $product->id, 'attributeId' => $attributeId]) }}">
                @csrf

                <!-- Display existing options -->
                <div class="mt-4">
                    <h3>Existing Options</h3>
                    <ul>
                      
                        @foreach($options as $option)
                        <div class="option-item">
                            <div class="form-row">
                                <div class="form-group col-md-2 label-user-u">
                                    {{ $option->attribute_option }}
                                </div>
                                <div class="form-group col-md-2">
                                    <input style="width: 18px; height: 18px;" type="checkbox" name="existing_options[]" value="{{ $option->id }}" {{ in_array($option->id, $existingOptionsArray) ? 'checked' : '' }}>
                                </div>
                                <div class="form-group col-md-2">
                                    <a href="{{ route('delete_attribute_option', ['optionId' => $option->id]) }}" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </ul>

                    <!-- Save Options button -->
                    <div class="form-row form-feedback-button text-left">
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-success">Save Options</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection