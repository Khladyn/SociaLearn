<!-- Add Resource Modal -->
<div class="modal fade" id="addResource" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fw-bold fs-5" id="staticBackdropLabel">Add Resource</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="successAlertResource" class="alert alert-success d-none" role="alert">
                    <!-- Success message will be displayed here -->
                </div>
                <form id="addResourceForm" method="post" action="{{ route('create_resource') }}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                    <div class="row">
                        <div class="col-md-12 my-2">
                            <label for="thumbnail">Thumbnail: </label>
                            <input class="form-control" type="file" id="thumbnail_file" name="thumbnail_file" accept="image/*">
                            <span class="error-message text-danger" id="thumbnail_file_error"></span>
                        </div>
                        <div class="col-md-12 my-2">
                            <label for="title">Title: *</label>
                            <input type="text" name="title" id="title" class="form-control rounded" placeholder="Enter resource title here..." required>
                            <span class="error-message text-danger" id="title_error"></span>
                        </div>
                        <div class="col-md-12 my-2">
                            <label for="type">Type: *</label>
                            <select class="form-select rounded" name="type" id="type" required>
                                <option value="" selected disabled>Select Type</option>
                                <option value="Video">Video</option>
                                <option value="Image">Image</option>
                                <option value="Audio">Audio</option>
                                <option value="Document">Document</option>
                                <option value="Link">Link</option>
                                <option value="Text">Text</option>
                            </select>
                            <span class="error-message text-danger" id="type_error"></span>
                        </div>
                        <div class="col-md-12 my-2" id="contentField">                            
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-success rounded-pill fw-bold me-1" type="submit"> Save Changes</button>
                <button class="btn btn-sm btn-danger rounded-pill fw-bold" type="button" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    $('#type').change(function () {
        var contentField = $('#contentField');
        var selectedType = $(this).val();

        // Clear previous content and hide/show content field based on selected type
        contentField.empty();

        contentField.append('<label for="resourceContent">Content: *</label>');

        // Add specific input field based on the selected type
        if (selectedType === 'Image' || selectedType === 'Video' || selectedType === 'Audio') {
            contentField.append('<input type="file" name="resource_file" id="resource_file" class="form-control rounded" accept="' + selectedType.toLowerCase() + '/*" required>');
            contentField.append('<span class="error-message text-danger" id="resource_file_error"></span>');
        } else if (selectedType === 'Document') {
            contentField.append('<input type="file" name="resource_file" id="resource_file" class="form-control rounded" accept=".pdf" required>');
            contentField.append('<span class="error-message text-danger" id="resource_file_error"></span>');
        } else if (selectedType === 'Text') {
            contentField.append('<textarea name="content" id="content" class="form-control rounded" rows="4" placeholder="Enter text here..." required></textarea>');
            contentField.append('<span class="error-message text-danger" id="content_error"></span>');
        } else {
            contentField.append('<input type="text" name="content" id="content" class="form-control rounded" placeholder="Enter link here..." required>');
            contentField.append('<span class="error-message text-danger" id="content_error"></span>');
        }
    });

    // Handle form submission via AJAX
    $('#addResourceForm').submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '{{ route('create_resource') }}',
            data: new FormData(this),
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (response) {
                $('.error-message').text('');

                // Handle your success logic here
                console.log(response);
                $('#successAlertResource').removeClass('d-none').text(response.message);
                $('.modal-body').scrollTop(0);

                // Optionally, you can close the modal after a delay
                setTimeout(function () {
                    $('#addResource').modal('hide');
                    $('#successAlertResource').addClass('d-none');
                    location.reload();
                }, 2000); // 2000 milliseconds (2 seconds) delay, adjust as needed
            },
            error: function (xhr, status, error) {
                // Handle validation errors
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;

                    // Clear previous errors
                    $('.error-message').text('');

                    // Display errors below the corresponding input fields
                    $.each(errors, function (field, message) {
                        $('#' + field + '_error').text(message[0]);
                    });
                }
            }
        });
    });
});


</script>