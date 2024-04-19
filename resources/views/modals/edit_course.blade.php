<div class="modal fade" id="editCourse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fw-bold fs-5" id="staticBackdropLabel">Edit Course</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id="successAlertCourse" class="alert alert-success d-none" role="alert">
                <!-- Success message will be displayed here -->
            </div>
            <form id="updateCourseForm" method="POST" action="{{ route('update_course', ['course' => $course->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Assuming you are using PATCH method for update -->
            
                <div class="row">
                    <div class="col-md-12 my-2">
                        <div class="current-header text-center">
                            <label>Current Image Header Used: </label><br>
                            <img src="{{ $course->image_header ? Storage::url('course_images/' . $course->image_header) : asset('img/defaults/default_img.png') }}" class="img-fluid course-header-preview"><br>
                        </div>
                        <div class="change-header">
                            <label class="mt-3"> Change Image Header: </label>
                            <input class="form-control" type="file" name="image_header" id="image_header" name="image_header">
                            <span class="error-message text-danger" id="image_header_error"></span>
                        </div>
                    </div>
                    <div class="col-md-12 my-2">
                        <label> Title: *</label>
                        <input type="text" name="title" id="title" class="form-control rounded" placeholder="Enter course title here..." value="{{ $course->title }}" required>
                        <span class="error-message text-danger" id="title_error"></span>
                    </div>
                    <div class="col-md-12 my-2">
                        <label> Description: *</label>
                        <textarea name="description" id="description" class="form-control rounded" rows="4" required>{{ $course->description }}</textarea>
                        <span class="error-message text-danger" id="description_error"></span>
                    </div>
                    <div class="col-md-12 my-2">
                        <label> Category: *</label>
                        <select class="form-select rounded" name="category" id="category" required>
                            <option value="" selected disabled>Select Course Category</option>
                            <!-- Add 'selected' attribute if the category matches the course's category -->
                            <option value="Web Development" {{ $course->category == 'Web Development' ? 'selected' : '' }}>Web Development</option>
                            <option value="Data Science" {{ $course->category == 'Data Science' ? 'selected' : '' }}>Data Science</option>
                            <option value="Graphic Design" {{ $course->category == 'Graphic Design' ? 'selected' : '' }}>Graphic Design</option>
                            <option value="Mobile App Development" {{ $course->category == 'Mobile App Development' ? 'selected' : '' }}>Mobile App Development</option>
                            <option value="UI/UX Design" {{ $course->category == 'UI/UX Design' ? 'selected' : '' }}>UI/UX Design</option>
                            <option value="Video Editing" {{ $course->category == 'Video Editing' ? 'selected' : '' }}>Video Editing</option>
                            <option value="Language and Speech" {{ $course->category == 'Language and Speech' ? 'selected' : '' }}>Language and Speech</option>
                        </select>
                        <span class="error-message text-danger" id="category_error"></span>
                    </div>
                    <div class="col-md-12 my-2">
                        <label> Level: *</label>
                        <select class="form-select rounded" name="level" id="level" required>
                            <option value="" selected disabled>Select Course Level</option>
                            <!-- Add 'selected' attribute if the level matches the course's level -->
                            <option value="Beginner" {{ $course->level == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                            <option value="Intermediate" {{ $course->level == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                            <option value="Advanced" {{ $course->level == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                        </select>
                        <span class="error-message text-danger" id="level_error"></span>
                    </div>
                </div>
            
                <div class="modal-footer">
                    <button class="btn btn-sm btn-success rounded-pill fw-bold me-1" type="submit"> Save Changes</button>
                    <button class="btn btn-sm btn-danger rounded-pill fw-bold" type="button" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
            
        </div>
    </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Handle form submission via AJAX
        $('#updateCourseForm').submit(function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '{{ route('update_course', ['course' => $course->id]) }}', // Update with your actual route
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {

                    $('.error-message').text('');
                    
                    // Update the displayed current email
                    // $('#title').text(response.title);
                    // $('#category').text(response.category);
                    // $('#profile_last_name').text(response.last_name);
                    // $('#profile_address').text(response.address);
                    // $('#profile_affiliation').text(response.affiliation);
                    // $('#profile_birthday').text(response.birthday);
                    // $('#profile_gender').text(response.gender);

                    // var profilePictureUrl = "{{ Storage::url('') }}" + response.profile_picture;

                    // $('#profile_picture_preview').attr('src', profilePictureUrl);
                    // $('#profile_picture_header').attr('src', profilePictureUrl);
                    // $('#profile_picture_cover').css('background-image', 'linear-gradient(to bottom, rgba(0,0,0,0.3) 0%,rgba(0,0,0,0.75) 100%), url(' + profilePictureUrl + ')');

                    // On success, show the success alert
                    $('#successAlertCourse').removeClass('d-none').text(response.message);
                    $('.modal-body').scrollTop(0);

                    // Optionally, you can close the modal after a delay
                    setTimeout(function () {
                        $('#editCourse').modal('hide');
                        $('#successAlertCourse').addClass('d-none')
                        location.reload();
                    }, 2000);
                },
                error: function (xhr, status, error) {
                    // Handle validation errors
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;

                        console.log(errors);

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