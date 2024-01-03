@extends('admin.layouts.main')
@section('title', 'Add Page')
@section('content')

@section('content')
<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800 w-600">Add Page</h1>
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
       
      <div class="card shadow mb-4">
      <div class="card-body">
	  
      <form method="POST" action="{{ url('admin/page/save-category') }}">
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
				  <textarea name="description" rows=5 id="name" placeholder="Description" class="form-control">{{ old('description') }}</textarea>
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

             
              <!-- New section for buttons -->
              <div class="form-row">
                <div class="form-group col-md-2">
                    &nbsp;
                </div>
                <div class="form-group col-md-7">
                  

                    <!-- Add button with dropdown -->
                    <div class="btn-group">
                      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-plus"></i> Add
                      </button>
                      <div class="dropdown-menu">
                        
                          <button class="dropdown-item" id="fetchHtmlBtn" type="button">Text + Images</button>
                          <button class="dropdown-item" id="fetchHtmlBtn1"type="button">Cards</button>
                          
                      </div>
                </div>
              </div>
            </div>
              <div class="form-row form-feedback-button text-left">
                <div class="form-group col-md-2">
                  &nbsp;
                </div>
                
              </div>
          

          <div class="myDiv" id="htmlContainer">

            <!-- Existing or dynamically added fields will be displayed here -->
            
        </div>

        <div class="form-group col-md-7">
          <button type="submit" name="submit" class="btn btn-primary py-2">Save</button>                      
      </div>

      </form>

    </div>
    </div></div>
    </div>

    <!-- JS -->
    <style>
   
      .remove-button {
          right: 20rem;
          position: absolute;
          margin-top: -2rem;
      }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
      integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
      crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
      integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
      crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
 
   function fetchHtmlAndAppendToContainer(url, targetElement, contentId, identifier) {
        $.ajax({
            type: 'GET',
            url: url,
            success: function (response) {
                var htmlContent = $(response).find(contentId).html();
                if (htmlContent) {
                    // Create a new div with a unique ID and add the "mt-5" class
                    var newDiv = $('<div class="added-field mt-5" id="field_' + identifier + '"></div>');
                    newDiv.html(htmlContent);

                    // Append the new content to the target element
                    $(targetElement).append(newDiv);

                    // Initialize Summernote on the new textarea
                    newDiv.find('.summernote').summernote({
                        height: 200, // Adjust the height as needed
                        // Add other Summernote options as needed
                    });

                    // Add a "Remove" button for the newly added div
                    var removeButton = $('<button class="btn btn-danger remove-button" data-identifier="' + identifier + '">Remove</button>');
                    removeButton.on('click', function () {
                        var identifierToRemove = $(this).data('identifier');
                        $('#field_' + identifierToRemove).remove();
                    });
                    newDiv.append(removeButton);
                } else {
                    $(targetElement).append('<p>Error: Section not found</p>');
                }
            },
            error: function (error) {
                $(targetElement).append('<p>Error: ' + error.responseJSON.error + '</p>');
            }
        });
    }
  // Track added fields
  var addedFields = 0;
  
  $(document).ready(function () {
      // Click event for the "Add Text and Image" button
      $('#fetchHtmlBtn').click(function () {
          addedFields++;
          fetchHtmlAndAppendToContainer('/admin/test_c/xt', '#htmlContainer', '#0nxt', addedFields);
      });
  
      // Click event for the "Add Card" button
      $('#fetchHtmlBtn1').click(function () {
          addedFields++;
          fetchHtmlAndAppendToContainer('/admin/test_c/cd', '#htmlContainer', '#0nxt1', addedFields);
      });
    });
  
  //     // Save button click event
  //     $('#saveButton').click(function () {
  //         // Create an array to store data from each form
  //         var formDataArray = [];
  
  //         // Iterate through added fields and collect form data
  //         for (var i = 1; i <= addedFields; i++) {
  //             var formData = $('#field_' + i + ' form').serializeArray();
  //             formDataArray.push(formData);
  //         }
  
  //         // Send the data to the server for database insertion
  //         $.ajax({
  //             type: 'POST',
  //             url: '/admin/test_c/save-content',
  //             headers: {
  //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //     },
  //             data: { formDataArray: formDataArray }, // Send the form data as an array
  //             success: function (response) {
  //                 // Handle the response if needed
  //                 console.log('Data saved successfully');
  //             },
  //             error: function (error) {
  //                 // Handle errors if needed
  //                 console.error('Error while saving data');
  //             }
  //         });
  //     });
  // });
  
  </script>
@endsection