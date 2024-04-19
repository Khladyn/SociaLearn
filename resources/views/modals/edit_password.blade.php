<div class="modal fade" id="changePwd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fw-bold fs-5" id="staticBackdropLabel">Change Password</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id="successAlertPwd" class="alert alert-success d-none" role="alert">
                <!-- Success message will be displayed here -->
            </div>
            <div class="alert alert-secondary" role="alert">
                <h5 class="alert-heading fw-bold">Password Guidelines</h5>
                <div class="pwd-guidelines" style="font-size: 12px;">
                    <ul> 
                        <li>8-20 characters</li>
                        <li>At least one (1) lowercase letter </li>
                        <li>At least one (1) capital letter</li>
                        <li>At least one (1) number</li>
                        <li>No spaces</li>
                    </ul>
                </div>
            </div>

            <form id="updatePasswordForm" method="post" action="{{ route('update_password') }}">
                @csrf
                <div class="row">
                    <!-- Other form fields -->
            
                    <div class="col-md-12 my-2">
                        <label for="current_password">Enter your current password:</label>
                        <input type="password" name="current_password" id="current_password" class="form-control rounded" required>
                        <span class="error-message text-danger" id="current_password_error"></span>
                    </div>
                    <div class="col-md-12 my-2">
                        <label for="new_password">Enter your new password:</label>
                        <input type="password" name="new_password" id="new_password" class="form-control rounded" required>
                        <span class="error-message text-danger" id="new_password_error"></span>
                    </div>
                    <div class="col-md-12 my-2">
                        <label for="confirm_new_password">Confirm your new password:</label>
                        <input type="password" name="confirm_new_password" id="confirm_new_password" class="form-control rounded" required>
                        <span class="error-message text-danger" id="confirm_new_password_error"></span>
                    </div>
                </div>            
                <div class="modal-footer">
                    <button class="btn btn-sm btn-success rounded-pill fw-bold me-1" type="submit">Save Changes</button>
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
        $('#updatePasswordForm').submit(function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '{{ route('update_password') }}', // Update with your actual route
                data: $(this).serialize(),
                success: function (response) {

                    $('.error-message').text('');
                    $('#current_password').val('');
                    $('#new_password').val('');
                    $('#confirm_new_password').val('');

                    // On success, show the success alert
                    $('#successAlertPwd').removeClass('d-none').text(response.message);
                    $('.modal-body').scrollTop(0);

                    // Optionally, you can close the modal after a delay
                    setTimeout(function () {
                        $('#changePwd').modal('hide');
                        $('#successAlertPwd').addClass('d-none')
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