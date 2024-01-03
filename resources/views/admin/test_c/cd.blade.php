@extends('admin.layouts.main')
@section('title', 'Add Card')
@section('content')


<div class="container-fluid" id="0nxt1">
  <h1 class="h3 mb-4 text-gray-800 w-600">Add Cards</h1> <div class="d-sm-flex align-items-center justify-content-between
    mb-4"> <div class="card shadow mb-4"> <div class="card-body">
    <form method="POST" action="{{ url('admin/test_c/save-content') }}">
    @csrf
    <input type="hidden" name="form_type" value="card">
    <input type="hidden" name="form_id" value="{{ $data->id ?? '' }}">
    <div class="form-row">
      <div class="form-group col-md-2 label-user-u">
        Title:
      </div>
      <div class="form-group col-md-7">
        <input type="text" name="title" id="title" placeholder="Title" class="form-control" value="{{ old('title') }}"
          required>
      </div>
    </div>
     <div class="form-row">
    <div class="form-group col-md-2 label-user-u">
    Images Style:
    </div>
    <div class="form-group col-md-7">
    <select name="selection" id="selection" class="form-control" required>
    <option value="" disabled selected>Select an option</option>
    <option value=" 1" @if(old('selection') == ' 1') selected @endif>Full Image</option>
    <option value=" 2" @if(old('selection') == ' 2') selected @endif>Image Right + Content</option>
    <option value=" 3" @if(old('selection')==' 3' ) selected @endif>Image Left + Content</option>
    </select>
    </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-2 label-user-u">
    Icon:
    </div>
    <div class="form-group col-md-7">
    <input type="file" name="icone" id="icone" class="form-control" value="{{ old('icone') }}" required>
    </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-2 label-user-u">
        description:
      </div>
      <div class="form-group col-md-7">
        <textarea name="description" rows=5 id="description" placeholder="Description"
          class="form-control">{{ old('description') }}</textarea>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-2 label-user-u">
        Text & Links:
      </div>
      <div class="form-group col-md-7">
        <div class="row">
          <div class="col">
            <input type="text" name="text_link" id="text_link" placeholder="Enter text" class="form-control"
              value="{{ old('text_link') }}">
          </div>
        </div>
        <div class="row py-3" id="link">
          <div class="col-12">
            <input type="text" name="link" id="link" placeholder="Enter link" class="form-control" value="{{ old('link') }}">
          </div>
        </div>
      </div>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    @endsection
