@extends('admin.layouts.main')
@section('title', 'Text And Image')
@section('content')

<div class="container-fluid myDiv" id="0nxt">
    <h1 class="h3 mb-4 text-gray-800 w-600">Text And Image</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ url('admin/cms/save-text') }}" enctype="multipart/form-data">
                    @csrf     
                    <div class="form-row">
                        <div class="form-group col-md-2 label-user-u">
                        Images Style:
                        </div>
                        <div class="form-group col-md-7">
                            <select name="selection" id="selection" class="form-control" required>
                                <option value="" disabled selected>Select an option</option>
                                <option value="1" @if(old('selection') == ' 1') selected @endif>Full Image</option>
                                <option value="2" @if(old('selection') == ' 2') selected @endif>Image Right + Content</option>
                                <option value="3" @if(old('selection') == ' 3') selected @endif>Image Left + Content</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2 label-user-u">
                            Image:
                        </div>
                        <div class="form-group col-md-7">
                            @if ($data->image ?? false)
                                <img src="{{ asset($data->image) }}" alt="Image" width="50">
                            @endif
                            <input type="file" name="image" accept="image/*" class="form-control" value="{{ $data->image ?? '' }}" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2 label-user-u">
                            Content:
                        </div>
                        <div class="form-group col-md-7">
                         
                            <textarea name="description" class="form-control" rows="20"></textarea>
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
