@extends('admin.layouts.main')
@section('title', 'Add Faq')
@section('content')


<!-- Define the content section -->
@section('content')

<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800 w-600">Add FAQ</h1>
  <div class="d-sm-flex align-items-center justify-content-between ">
    <div class="card shadow mb-4">
      @if ($errors->any())
      <div class="alert alert-danger" id="verr">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <div class="card-body">
        <form method="POST" action="{{ url('admin/faq/save-faq') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-2 label-user-u">
              Question:
            </div>
            <div class="form-group col-md-7">
              <input type="text" name="question" id="question" placeholder="Question" class="form-control" value="{{ old('question') }}" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-2 label-user-u">
              Category
            </div>
            <div class="form-group col-md-7">
              <select name="category" class="form-control" required>
                <option value="">Category</option>
                @foreach($categories as $categoryId => $categoryName)
                <option value="{{ $categoryId }}">{{ $categoryName }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-2 label-user-u">
              Answer:
            </div>
            <div class="form-group col-md-7">
              <textarea name="answer"  rows=5 id="answer" placeholder="Answer" class="form-control ckeditort">{{ old('answer') }}</textarea>
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