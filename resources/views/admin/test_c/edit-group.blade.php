@extends('admin.layouts.main')
@section('title', 'Edit Group')
@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800 font-weight-bold">Edit Group</h1>

    @foreach ($groupData as $data)
        <div> 
            @if ($data->form_type === 'text_image')
                <!-- Text and Images Form -->
                <div class="container-fluid" id="0nxt1">
                    <h1 class="h3 mb-4 text-gray-800 w-600">Edit Text and Images</h1>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                            <form method="POST" action="{{ route('test_c.update_form', ['id' => $data->id]) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')

                                    <input type="hidden" name="form_type" value="text_image">
                                    <input type="hidden" name="id" value="{{ $data->id }}">


                                    <div class="form-row">
                                        <div class="form-group col-md-2 label-user-u">
                                            Title:
                                        </div>
                                        <div class="form-group col-md-7">
                                            <input type="text" name="title" id="title" placeholder="Title" class="form-control" value="{{ old('title', $data->title ?? '') }}" required>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-2 label-user-u">
                                            Images Style:
                                        </div>
                                        <div class="form-group col-md-7">
                                            <select name="selection" id="selection" class="form-control" required>
                                                <option value="" disabled>Select an option</option>
                                                <option value="1" @if(old('selection', $data->selection ?? '') == '1') selected @endif>Full Image</option>
                                                <option value="2" @if(old('selection', $data->selection ?? '') == '2') selected @endif>Image Right + Content</option>
                                                <option value="3" @if(old('selection', $data->selection ?? '') == '3') selected @endif>Image Left + Content</option>
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
                                            <input type="file" name="image" accept="image/*" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-2 label-user-u">
                                            Content:
                                        </div>
                                        <div class="form-group col-md-7">
                                            <textarea name="description" id="text" class="form-control" rows="10">{{ old('description', $data->description ?? '') }}</textarea>
                                        </div>
                                    </div> 
                                        
                                    <button type="button" class="btn btn-danger remove-section">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif ($data->form_type === 'card')
                <!-- Card Form -->
                <div class="container-fluid" id="0nxt1">
                    <h1 class="h3 mb-4 text-gray-800 w-600">Edit Card</h1>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <form method="POST" action="{{ route('test_c.update_form', ['id' => $data->id]) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="form_type" value="card">
                                    <input type="hidden" name="id" value="{{ $data->id }}">

                                    <div class="form-row">
                                    <div class="form-group col-md-2 label-user-u">
                                            Title:
                                        </div>
                                        <div class="form-group col-md-7">
                                            <input type="text" name="title" id="title" placeholder="Title" class="form-control" value="{{ old('title', $data->title ?? '') }}" required>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-2 label-user-u">
                                            Images Style:
                                        </div>
                                        <div class="form-group col-md-7">
                                            <select name="selection" id="selection" class="form-control" required>
                                                <option value="" disabled>Select an option</option>
                                                <option value="1" @if(old('selection', $data->selection ?? '') == '1') selected @endif>Full Image</option>
                                                <option value="2" @if(old('selection', $data->selection ?? '') == '2') selected @endif>Image Right + Content</option>
                                                <option value="3" @if(old('selection', $data->selection ?? '') == '3') selected @endif>Image Left + Content</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                       
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
                                            Description:
                                        </div>
                                        <div class="form-group col-md-7">
                                            <textarea name="description" rows=5 id="description" placeholder="Description" class="form-control">{{ old('description', $data->description ?? '') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-2 label-user-u">
                                            Text & Links:
                                        </div>
                                        <div class="form-group col-md-7">
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" name="text_link" id="text_link" placeholder="Enter text" class="form-control" value="{{ old('text_link', $data->text_link ?? '') }}">
                                                </div>
                                            </div>
                                            <div class="row py-3" id="linkInputRow">
                                                <div class="col-12">
                                                    <input type="text" name="link" id="linkInput" placeholder="Enter link" class="form-control" value="{{ old('link', $data->link ?? '') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-danger remove-section">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @endforeach

    <!-- Single "Save Changes" button -->
    <div class="container-fluid mt-4">
        <button type="button" class="btn btn-primary" id="saveAllChanges">Save Changes</button>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Handle click event on "Save Changes" button
        $('#saveAllChanges').click(function () {
            // Iterate through each form and submit it
            $('form').each(function () {
                var form = $(this);

                // Perform form submission using AJAX
                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: new FormData(form[0]),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Handle success response if needed
                        console.log(response);
                        window.location.href = "{{ route('test_c.list') }}";
                    },
                    error: function(xhr, status, error) {
                        // Handle error response if needed
                        console.error(xhr.responseText);
                    }
                });
            });
        });

       // Handle click event on "Remove" button
$(document).on('click', '.remove-section', function () {
    var container = $(this).closest('.container-fluid');
    var formId = container.find('input[name="id"]').val(); // Assuming you have an input with the name "id"

    if (confirm('Are you sure you want to remove this section?')) {
        $.ajax({
            url: "/admin/test_c/remove-section/" + formId, // Replace with your actual route for removing a section
            method: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                id: formId
            },
            success: function(response) {
                // Handle success response if needed
                console.log(response);

                // Remove the container if the server-side deletion was successful
                container.remove();
            },
            error: function(xhr, status, error) {
                // Handle error response if needed
                console.error(xhr.responseText);
            }
        });
    }
});
});



</script>
    




@endsection

