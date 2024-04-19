<div class="modal fade" id="editProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fw-bold fs-5" id="staticBackdropLabel">Edit Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id="successAlertProfile" class="alert alert-success d-none" role="alert">
                <!-- Success message will be displayed here -->
            </div>
            <form id="updateProfileForm" method="post" action="{{ route('update_profile') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 my-2">
                        <div class="current-header text-center">
                            <label>Current Profile Picture Used: </label><br>
                            <img src="{{ Storage::url(auth()->user()->profile_picture) }}" class="rounded-circle profile-current-preview" id="profile_picture_preview"><br>
                        </div>
                        <div class="change-header">
                            <label class="mt-3"> Change Profile Picture: </label>
                            <input class="form-control" type="file" id="profile_picture" name="profile_picture">
                        </div>
                    </div>
                    <div class="col-md-12 my-2">
                        <label> First Name: *</label>
                        <input type="text" name="first_name" id="first_name" class="form-control rounded" value="{{ auth()->user()->first_name }}" required>
                        <span class="error-message text-danger" id="first_name_error"></span>
                    </div>
                    <div class="col-md-12 my-2">
                        <label> Middle Name: *</label>
                        <input type="text" name="middle_name" id="middle_name" class="form-control rounded" value="{{ auth()->user()->middle_name }}" required>
                        <span class="error-message text-danger" id="middle_name_error"></span>
                    </div>
                    <div class="col-md-12 my-2">
                        <label> Last Name: *</label>
                        <input type="text" name="last_name" id="last_name" class="form-control rounded" value="{{ auth()->user()->last_name }}" required>
                        <span class="error-message text-danger" id="last_name_error"></span>
                    </div>
                    <div class="col-md-12 my-2">
                        <label> Address: *</label>
                        <input type="text" name="address" id="address" class="form-control rounded" value="{{ auth()->user()->address }}" required>
                        <span class="error-message text-danger" id="address_error"></span>
                    </div>
                    <div class="col-md-12 my-2">
                        <label> School/Institution Affiliated With: *</label>
                        <input type="text" name="affiliation" id="affiliation" class="form-control rounded" value="{{ auth()->user()->affiliation }}" required>
                        <span class="error-message text-danger" id="affiliation_error"></span>
                    </div>
                    <div class="col-md-12 my-2">
                        <label> Birthday: *</label>
                        <input type="date" name="birthday" id="birthday" class="form-control rounded" value="{{ auth()->user()->birthday }}" required>
                        <span class="error-message text-danger" id="birthday_error"></span>
                    </div>
                    <div class="col-md-12 my-2">
                        <label> Gender: *</label>
                        <select class="form-select rounded" name="gender" id="gender" required>
                            <option value="">Select Gender</option>
                            <option value="Male" {{ auth()->user()->gender === 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ auth()->user()->gender === 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Prefer not to say" {{ auth()->user()->gender === 'Prefer not to say' ? 'selected' : '' }}>Prefer not to say</option>
                        </select>
                        <span class="error-message text-danger" id="gender_error"></span>
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
        // Handle form submission via AJAX
        $('#updateProfileForm').submit(function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '{{ route('update_profile') }}', // Update with your actual route
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {

                    $('.error-message').text('');
                    
                    // Update the displayed current email
                    $('#profile_first_name').text(response.first_name);
                    $('#profile_middle_name').text(response.middle_name);
                    $('#profile_last_name').text(response.last_name);
                    $('#profile_address').text(response.address);
                    $('#profile_affiliation').text(response.affiliation);
                    $('#profile_birthday').text(response.birthday);
                    $('#profile_gender').text(response.gender);

                    // var profilePictureUrl = "{{ Storage::url('') }}" + response.profile_picture;

                    // $('#profile_picture_preview').attr('src', profilePictureUrl);
                    // $('#profile_picture_header').attr('src', profilePictureUrl);
                    // $('#profile_picture_cover').css('background-image', 'linear-gradient(to bottom, rgba(0,0,0,0.3) 0%,rgba(0,0,0,0.75) 100%), url(' + profilePictureUrl + ')');

                    // On success, show the success alert
                    $('#successAlertProfile').removeClass('d-none').text(response.message);
                    $('.modal-body').scrollTop(0);

                    // Optionally, you can close the modal after a delay
                    setTimeout(function () {
                        $('#editProfile').modal('hide');
                        $('#successAlertProfile').addClass('d-none')
                        location.reload();
                    }, 2000); // 3000 milliseconds (3 seconds) delay, adjust as needed
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