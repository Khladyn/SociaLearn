@extends('layouts.app')

@section('content')

<div class="container-fluid px-lg-5 p-3 min-vh-100">
    <!-- Start of Content -->
    <div class="form-group my-3 mb-4">
        <form type="get" action="#">
            <div class="input-group">
                <input type="text" class="form-control" id="search_user" name="search_user" placeholder="Search a user..." required>
                {{-- <button class="btn btn-dark fw-bold"> <i class="fas fa-search"></i> </button> --}}
            </div>
        </form>
    </div>
        <div class="table-responsive mt-3 mb-5">
            <table class="table sl-table table-hover" id="sl-network">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Profile Picture</th>
                        <th>Name</th>
                        <th>E-mail Address</th>
                        <th>Affiliation</th>
                        <th># of Courses Enrolled</th>
                        <th># of Courses Teaching</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($users as $user)
                        <tr class="user-row">
                            <td>{{ $user->id }}</td>
                            <td><img src="{{ $user->profile_picture ? Storage::url($user->profile_picture) : asset('img/defaults/default_avatar.jpg') }}" width="50" height="50" class="rounded-circle"></td>
                            <td class="user-name">{{ $user->first_name }} {{ $user->last_name }}</td>
                            <td class="user-email">{{ $user->email }}</td>
                            <td class="user-affiliation">{{ $user->affiliation }}</td>
                            {{-- <td>{{ $user->courses_enrolled }}</td>
                            <td>{{ $user->courses_teaching }}</td> --}}
                            <td>55</td>
                            <td>60</td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('view_profile', ['user' => $user->id]) }}" class="btn btn-sm btn-dark rounded-3 fw-bold me-1" type="button">View</a>
                                
                                    @php
                                        $userId = auth()->check() ? auth()->user()->id : null;
                                
                                        $unreadMessages = $messages->where('recipient_id', $userId)
                                            ->where('sender_id', $user->id)
                                            ->where('is_read', 0)
                                            ->pluck('id');
                                
                                        $hasUnreadMessages = $unreadMessages->isNotEmpty();
                                        $buttonClass = $hasUnreadMessages ? 'btn-warning' : 'btn-dark';
                                    @endphp
                                
                                    {{-- Use inline ternary condition to set the class --}}
                                    <form id="markAsReadForm" method="post" action="{{ route('read_messages') }}">
                                        @csrf
                                        @foreach($unreadMessages as $messageId)
                                            <input type="hidden" name="message_ids[]" value="{{ $messageId }}">
                                        @endforeach
                                        <button type="submit" class="btn btn-sm rounded-3 fw-bold {{ $buttonClass }}" onclick="event.preventDefault(); markAsRead('{{ $user->id }}');">Message</button>
                                    </form>
                                </div>
                                                              
                            </td>
                        </tr>
                    @endforeach
                    
                    </tr>
                </tbody>
            </table>
        </div>

    <!-- End of Content -->
    </div>

    <!-- Edit Profile Modal -->
    @include('modals.chat')

    <script>

        // setInterval(function () {
        //     location.reload();
        // }, 1000); // 1000 milliseconds = 1 second

        $("#search_user").on("keyup", function() {
            var searchQuery = $(this).val().toLowerCase();

            $(".user-row").filter(function() {
                // Check if any of the columns (name, email, affiliation) contain the search query
                var name = $(this).find(".user-name").text().toLowerCase();
                var email = $(this).find(".user-email").text().toLowerCase();
                var affiliation = $(this).find(".user-affiliation").text().toLowerCase();

                // Toggle the visibility based on whether the search query is found in any column
                $(this).toggle(name.indexOf(searchQuery) > -1 || email.indexOf(searchQuery) > -1 || affiliation.indexOf(searchQuery) > -1);
            });
        });

        function markAsRead(userId) {
// Assuming you have only one hidden input field with the name "message_ids[]"
// var messageId = document.querySelector('input[name="message_ids[]"]').value;
// console.log("Message ID: " + messageId);

            
            $.ajax({
                url: $('#markAsReadForm').attr('action'),
                method: 'POST',
                data: $('#markAsReadForm').serialize(),
                success: function () {
                    // Handle modal opening logic here
                    // For example, if you are using Bootstrap modals:
                    $('#chatboxModal_' + userId).modal('show');
                    console.log("Modal ID: #chatboxModal_" + userId);
                },
                error: function () {
                    console.log(error);
                    // Handle error if needed
                }
            });
        }

        $('#sl-network').DataTable( {
             columnDefs: [
                 { orderable: false, targets: [1,6] }
             ],
             order: [[0, 'desc']],
             language: {
                 paginate: {
                     first:    '«',
                     previous: '‹',
                     next:     '›',
                     last:     '»'
                 },
                 aria: {
                     paginate: {
                         first:    'First',
                         previous: 'Previous',
                         next:     'Next',
                         last:     'Last'
                     }
                 }
             }
         });
     </script>

@endsection