<div class="modal fade" id="changeEmail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fw-bold fs-5" id="staticBackdropLabel">Change E-mail Address</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="successAlert" class="alert alert-success d-none" role="alert">
                    <!-- Success message will be displayed here -->
                </div>
                <form id="updateEmailForm" method="post" action="{{ route('update_email') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 my-2">
                            <label for="current_email">Current E-mail Address:</label>
                            <h5 class="fw-bold" id="current_email">{{ auth()->user()->email }}</h5>
                        </div>
                        <div class="col-md-12 my-2">
                            <label for="new_email">Enter your new E-mail Address:</label>
                            <input type="email" name="new_email" id="new_email" class="form-control rounded" required>
                            <span class="error-message text-danger" id="new_email_error"></span>
                        </div>
                        
                        <div class="col-md-12 my-2">
                            <label for="confirm_new_email">Confirm your new E-mail Address:</label>
                            <input type="email" name="confirm_new_email" id="confirm_new_email" class="form-control rounded" required>
                            <span class="error-message text-danger" id="confirm_new_email_error"></span>
                        </div>
                        
                        <div class="col-md-12 my-2">
                            <label for="password">Enter your password to save changes:</label>
                            <input type="password" name="password" id="password" class="form-control rounded" required>
                            <span class="error-message text-danger" id="password_error"></span>
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
    $('#updateEmailForm').submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '{{ route('update_email') }}',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (response) {

                $('.error-message').text('');

                // Update the displayed current email
                $('#user_email').text(response.current_email);
                $('#profile_email').text(response.current_email);
                $('#current_email').text(response.current_email);

                // On success, show the success alert
                $('#successAlert').removeClass('d-none').text(response.message);
                $('.modal-body').scrollTop(0);

                // Optionally, you can close the modal after a delay
                setTimeout(function () {
                    $('#changeEmail').modal('hide');
                    $('#successAlert').addClass('d-none')
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