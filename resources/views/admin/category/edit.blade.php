@extends('admin.layouts.main')
@section('title', 'Update Category')
@section('content')

@section('content')
<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800 w-600">Update Category</h1>
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
       
      <div class="card shadow mb-4">
      <div class="card-body">
	  
      <form method="POST" action="{{ url('admin/category/update') }}" enctype="multipart/form-data">
		         @csrf
            <input type="hidden" name="id" value="{{ $data->id }}">
              <div class="form-row">
                <div class="form-group col-md-2 label-user-u">
                  Title: 
                </div>
                <div class="form-group col-md-7">
                  <input type="text" name="name" id="name" placeholder="Title" class="form-control" value="{{ $data->name }}" required>
                </div>
              </div>
			  <div class="form-row">
            <div class="form-group col-md-2 label-user-u">
              Parent Category
            </div>

            <div class="form-group col-7">
    <select name="parent" class="form-control">
        <option value="">Parent</option>
        @foreach($categories as $categoryId => $categoryName)
            <option value="{{ $categoryId }}" @if($data->parent == $categoryId) selected @endif>{{ $categoryName }}</option>
            <!-- Assuming $data->parent represents the selected category's parent -->
        @endforeach
    </select>
              <select id="childCategory1" name="child" class="form-control mt-2" style="display: none;">
                <option value="">Select Child Category</option>
              </select>

              <select id="childCategory2" name="child" class="form-control mt-2" style="display: none;">
                <option value="">Select Child Category</option>
              </select>

              <select id="childCategory3" name="child" class="form-control mt-2" style="display: none;">
                <option value="">Select Child Category</option>
              </select>

              <select id="childCategory4" name="child" class="form-control mt-2" style="display: none;">
                <option value="">Select Child Category</option>
              </select>

            </div>

          </div>
              <div class="form-row">
                <div class="form-group col-md-2 label-user-u">
                  description: 
                </div>
                <div class="form-group col-md-7">
				  <textarea name="description" id="editor" rows=5 id="name" placeholder="Description" class="form-control">{{ $data->description }}</textarea>
                </div>
              </div>             
              <div class="form-row">
                <div class="form-group col-md-2 label-user-u">
                  Status: 
                </div>
                <div class="form-group col-md-4">
                    <input type="radio" id="active" name="status" value="1" {{ ($data->status == 1) ? 'checked' : '' }}>
                    <label for="active">Active</label>
                    <input type="radio" id="inactive" name="status" value="0" {{ ($data->status == 0) ? 'checked' : '' }}>
                    <label for="inactive">Disabled</label>
                </div>
              </div>
			     <div class="form-row">
            <div class="form-group col-md-2 label-user-u">
              Image:
            </div>
            <div class="form-group col-md-7">
              @if ($data->image)
              <img src="{{ asset($data->image) }}" alt="Image" width="50">
              @endif
              <input type="file" name="image" accept="image/*" class="form-control" value="{{ $data->image }}" />
            </div>
          </div>
		   
			  <div class="form-row">
                <div class="form-group col-md-2 label-user-u">
                  Featured Category
                </div>
                <div class="form-group col-md-4">
                    <input type="Checkbox" id="featured_category" name="featured_category" value="1" {{ ($data->featured_category == 1) ? 'checked' : '' }}>
                    <label for="featured_category">Featured Category</label>
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
    </div></div>
    </div>
@endsection