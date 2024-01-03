@extends('admin.layouts.main')

@section('title', 'Update faq')

@section('content')


<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 w-600">Update faq</h1>
</div>

<div class="card shadow mb-4">
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="card-body">
        <form method="POST" action="{{ url('admin/faq/update') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $data->id }}">

            <div class="form-row">
                <div class="form-group col-md-2 label-user-u">
                    Question:
                </div>
                <div class="form-group col-md-7">
                    <input type="text" name="question" id="model-name" placeholder="Question" class="form-control" value="{{ $data->answer }}" required>
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
                        <option  <?php if($data->category == $categoryId){ echo "selected=true"; } ?> value="{{ $categoryId }}">{{ $categoryName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2 label-user-u">
                    Answer:
                </div>
                <div class="form-group col-md-7">
                    <textarea name="answer" rows=5 id="answer" placeholder="=Answer" class="form-control ckeditort">{{ $data->answer}}</textarea>
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

            <div class="form-row form-feedback-button text-left">
                <div class="form-group col-md-2">
                    &nbsp;
                </div>
                <div class="form-group col-md-7">
                    <button type="submit" name="_submit" class="btn btn-primary py-3">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection