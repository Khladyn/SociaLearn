    <div class="modal fade" id="deleteAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fw-bold fs-5" id="staticBackdropLabel">Delete Account</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <p> Are you sure you want to delete your account? This action can't be undone.</p>
                    
                </div>
                <div class="modal-footer">
                    <form id="deleteAccountForm" method="post" action="{{ route('delete_user', ['user' => auth()->user()->id]) }}">
                        @csrf
                        @method('DELETE')
                    <button id="confirmDeleteBtn" class="btn btn-sm btn-success rounded-pill fw-bold me-1" type="submit"> Yes</button>
                    </form>
                    <button class="btn btn-sm btn-danger rounded-pill fw-bold" type="button" data-bs-dismiss="modal">Cancel</button>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#confirmDeleteBtn').click(function () {
                $('#deleteAccountForm').submit();
            });
        });
    </script>