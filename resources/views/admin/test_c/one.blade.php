@extends('admin.layouts.main')
@section('title', 'Add content')
@section('content')
<style>
    .remove-button {
        right: 25rem;
        position: absolute;
        margin-top: -2rem;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-iG/lTMwEMRuxWILE9QxPPxLdqCY9v9fHJTcYh/WaAZZ49D+lL5BkmSHHdXJ13Xjl"
    crossorigin="anonymous"></script>
<script>
    // Function to fetch HTML content based on a URL and append it to a target element
   // Function to fetch HTML content based on a URL and append it to a target element
function fetchHtmlAndAppendToContainer(url, targetElement, contentId, identifier, formType) {
    $.ajax({
        type: 'GET',
        url: url,
        success: function (response) {
            var htmlContent = $(response).find(contentId).html();
            if (htmlContent) {
                // Create a new div with a unique ID and add the "mt-5" class
                var newDiv = $('<div class="added-field mt-5" id="field_' + identifier + '" data-form-type="' + formType + '"></div>');
                newDiv.html(htmlContent);

                // Append the new content to the target element
                $(targetElement).append(newDiv);

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
    // Click event for adding a card
    $('#fetchHtmlBtn1').click(function () {
        addedFields++;
        var formType = 'card'; // Set the form type here
        fetchHtmlAndAppendToContainer('/admin/test_c/cd', '#htmlContainer', '#0nxt1', addedFields, formType);
    });

    // Click event for adding text and image
    $('#fetchHtmlBtn').click(function () {
        addedFields++;
        var formType = 'text_image'; // Set the form type here
        fetchHtmlAndAppendToContainer('/admin/test_c/xt', '#htmlContainer', '#0nxt', addedFields, formType);
    });

    // Save button click event
    $('#saveButton').click(function () {
        // Create an array to store data from each form along with form type
        var formDataArray = [];

        // Iterate through added fields and collect form data and form type
        for (var i = 1; i <= addedFields; i++) {
            var formType = $('#field_' + i).data('form-type'); // Get form type from data attribute
            var formData = {
                data: $('#field_' + i + ' form').serializeArray(),
                formType: formType // Change 'type' to 'formType'
            };
            formDataArray.push(formData);
        }

        // Send the data to the server for database insertion
        $.ajax({
            type: 'POST',
            url: '/admin/test_c/save-content',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                formDataArray: formDataArray,
               
            },
            success: function (response) {
                // Handle the response if needed
                console.log('Data saved successfully');

                window.location.href = 'https://3dcakes.gprlive.com/admin/test_c/list';
            },
            error: function (error) {
                // Handle errors if needed
                console.error('Error while saving data');
            }
        });
    });
});

</script>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card shadow mb-4">
            <div class="card-body row">
                <div class="col-md-10">
                    <h1 class="h3 mb-4 text-gray-800 w-600">Add Content Field</h1>
                </div>
                <div class="col-md-2">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Add field
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" id="fetchHtmlBtn" href="#">Add Text And Image</a></li>
                            <li><a class="dropdown-item" id="fetchHtmlBtn1" href="#">Add Card</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="myDiv" id="htmlContainer">
        <!-- Existing or dynamically added fields will be displayed here -->
    </div>

    <div class="form-group mt-5 col-md-7">
        <button type="submit" id="saveButton" name="submit" class="btn btn-primary py-2">Save</button>
    </div>
</div>

@endsection
