                <div class="modal fade" id="deleteCourse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <form id="deleteAccountForm" method="post" action="{{ route('delete_course', ['course' => $course->id]) }}">
                            @csrf
                            @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fw-bold fs-5" id="staticBackdropLabel">Delete Course</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p> Are you sure you want to delete this course? </p>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-sm btn-success rounded-pill fw-bold me-1" type="submit"> Yes</button>
                                <button class="btn btn-sm btn-danger rounded-pill fw-bold" type="button" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>