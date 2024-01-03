@extends('admin.layouts.main')
@section('title', 'Add Block')
@section('content')

@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800 w-600">Add Block</h1>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">

    <div class="card shadow mb-4">
      <div class="card-body">

        <form method="POST" action="{{ url('admin/block/save-category') }}" enctype="multipart/form-data">

          @csrf
          <div class="form-row">
            <div class="form-group col-md-2 label-user-u">
              Title:
            </div>
            <div class="form-group col-md-7">
              <input type="text" name="name" id="name" placeholder="Title" class="form-control"
                value="{{ old('name') }}" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-2 label-user-u">
               Category
            </div>
            <div class="form-group col-md-7">
              <select name="blockCategory" class="form-control">
                <option value="">Select Category</option>
                @foreach($blockCategory as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-2 label-user-u">
              description:
            </div>



            
            <div class="form-group col-md-7">
              <textarea name="description" id="editor" rows=5 id="name" placeholder="Description"
                class="form-control">{{ old('description') }}</textarea>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-2 label-user-u">
              Action :
            </div>
            <div class="form-group col-md-3"><label  style="color: #848484;font-size: smaller;">Lable</label>
              <input type="text" name="lable" id="name" placeholder="lable" class="form-control"
                value="{{ old('lable') }}" required>
            </div>

            <div class="form-group  col-md-3"><label  style="color: #848484;font-size: smaller;">Link</label>
              <input type="text" name="link" id="name" placeholder="link" class="form-control" value="{{ old('link') }}"
                required>
            </div>

            <div class="form-group col-md-1"><label  style="color: #848484;font-size: smaller;">Target</label>
              <select name="target" required class="form-control">
                <option value="0" selected>Self</option>
                <option value="1">Blank</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-2 label-user-u">
              Product Image :
            </div>
            <div class="form-group col-md-7">
              <input type="file" name="image" placeholder="Image Url" class="form-control" value="{{ old('image') }}" />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-2 label-user-u">
            </div>
            <div class="form-group col-md-3"><label  style="color: #848484;font-size: smaller;">Image Title</label>
              <input type="text" name="image_title" id="name" placeholder="Image Title" class="form-control"
                value="{{ old('image_title') }}" required>
            </div>
            <div class="form-group col-md-4"><label  style="color: #848484;font-size: smaller;">Image Alt</label>
              <input type="text" name="image_alt" id="name" placeholder=" Image Alt" class="form-control"
                value="{{ old('image_alt') }}" required>
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
              <button type="submit" name="submit" class="btn btn-primary py-3">Save</button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection