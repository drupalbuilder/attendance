@extends('admin.layouts.main')
@section('title', 'Update Cms')
@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800 w-600">Update content</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ url('admin/cms/save-cms') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    
                    <div class="form-row">
                        <div class="form-group col-md-2 label-user-u">
                            Images Style:
                        </div>
                        <div class="form-group col-md-7">
                            <select name="selection" id="selection" class="form-control" required>
                                <option value="1" @if($data->images_style == 1) selected @endif>Full Image</option>
                                <option value="2" @if($data->images_style == 2) selected @endif>Image Right + Content</option>
                                <option value="3" @if($data->images_style == 3) selected @endif>Image Left + Content</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2 label-user-u">
                            Icon:
                        </div>
                        <div class="form-group col-md-7">
                            <input type="file" name="icon" id="name" class="form-control" value="{{ $data->icon }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2 label-user-u">
                            Title:
                        </div>
                        <div class="form-group col-md-7">
                            <input type="text" name="title" id="name" placeholder="Title" class="form-control" value="{{ $data->title }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2 label-user-u">
                            Description:
                        </div>
                        <div class="form-group col-md-7">
                            <textarea name="description" rows="5" id="name" placeholder="Description" class="form-control">{{ $data->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2 label-user-u">
                            Text & Links:
                        </div>
                        <div class="form-group col-md-7">
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="text" id="text1" placeholder="Enter text" class="form-control" value="{{ $data->text }}">
                                </div>
                            </div>
                            <div class="row py-3" id="linkInputRow">
                                <div class="col-md-6">
                                    <input type="text" name="link" id="linkInput" placeholder="Enter link" class="form-control" value="{{ $data->link }}">
                                </div>
                            </div>
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
