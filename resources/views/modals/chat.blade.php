@foreach($users as $user)
    <div class="modal fade" id="chatboxModal_{{ $user->id }}" tabindex="-1" aria-labelledby="chatboxModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="chatboxModalLabel">Conversation with {{ $user->first_name }} {{ $user->last_name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: calc(80vh - 120px); overflow-y: auto;">
                <!-- Chat content goes here -->
                <div class="chat-messages" id="chatMessages_{{ $user->id }}">
                    <!-- Display chat messages -->
                    @if($messages->isEmpty() || (!$messages->where('recipient_id', $user->id)->count() && !$messages->where('sender_id', $user->id)->count()))
                        <p class="alert alert-secondary text-center">No messages yet</p>
                    @else
                        @foreach($messages as $message)
                            @if($message->sender_id == $user->id && $message->recipient_id == auth()->user()->id)
                                <div class="d-flex flex-column align-items-start">
                                    <div class="alert alert-secondary mb-0 mt-2">
                                        {{ $message->message }}
                                    </div>
                                    <small>{{ date('F j, Y h:i A', strtotime($message->created_at)) }}</small>
                                </div>
                            @elseif($message->sender_id == auth()->user()->id && $message->recipient_id == $user->id)
                                <div class="d-flex flex-column align-items-end">
                                    <div class="alert alert-info mb-0 mt-2">
                                        {{ $message->message }}
                                    </div>
                                    <small>{{ date('F j, Y h:i A', strtotime($message->created_at)) }}</small>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
                  
                <div class="modal-footer">
                    <textarea id="messageInput_{{ $user->id }}" class="form-control" placeholder="Type your message..."></textarea>
                    <button data-user-id="{{ $user->id }}" type="button" class="btn btn-primary sendMessageBtn">Send</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

<script>

$(document).ready(function () {
    $('.sendMessageBtn').click(function () {
        var userId = $(this).data('user-id');
        var message = $('#messageInput_' + userId).val();
        var button = $('#sendMessageBtn_' + userId); // Reference to the button with a different ID

        // Your AJAX request to send a message
        $.ajax({
            type: 'POST',
            url: '{{ route('send_message') }}',
            data: {
                '_token': '{{ csrf_token() }}',
                'message': message,
                'recipient_id': userId, // Corrected the variable name to 'userId'
            },
            success: function (response) {
                // Handle success, update the chat messages, etc.
                console.log(response);
                button.removeClass('btn-dark').addClass('btn-success');

                // Assuming you have a container for chat messages with the id 'chatMessages_<user_id>'
                var chatMessagesContainer = $('#chatMessages_' + userId);

                // Append the new message to the chat messages
                chatMessagesContainer.append(
                    '<div class="d-flex flex-column align-items-end">' +
                        '<div class="alert alert-info">' + message + '</div>' +
                        // '<small class="text-muted">' + $message->created_at + '</small>' +
                    '</div>'

                );

                // Clear the input field
                $('#messageInput_' + userId).val('');

                // Scroll to the bottom of the chat messages
                chatMessagesContainer.scrollTop(chatMessagesContainer[0].scrollHeight);

            },
            error: function (error) {
                // Handle errors if needed
                console.error(error);
            }
        });
    });

    function formatDate(timestamp) {
    // const date = new Date(timestamp);
    // const options = { month: 'long', day: 'numeric', year: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true };
    // return date.toLocaleString('en-US', options);
    }

    // You may need additional JavaScript to load initial messages when the modal is opened
    // You can use a similar AJAX request to load messages and populate the 'chatMessagesContainer'
});
</script>