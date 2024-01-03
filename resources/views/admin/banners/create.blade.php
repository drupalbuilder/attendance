@extends('admin.layouts.main')
@section('title', 'Add Banners')
@section('content')

@section('content')
<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800 w-600">Add Banners</h1>
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
       
      <div class="card shadow mb-4">
      <div class="card-body">
	  
      <form method="POST" action="{{ url('admin/banners/save-category') }}" enctype="multipart/form-data">
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
                  description: 
                </div>
                <div class="form-group col-md-7">
				  <textarea name="description" id="editor" rows=5 id="name" placeholder="Description" class="form-control">{{ old('description') }}</textarea>
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
					Image Url:
					</div>
					<div class="form-group col-md-7">
							<input type="file" name="image" placeholder="Image Url" class="form-control" value="{{ old('image') }}" />
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