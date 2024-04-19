@extends('layouts.app')

@section('content')

<div class="container-fluid px-lg-5 p-3 min-vh-100">
    <!-- Start of Content -->
    <div class="profile my-4">

        <div class="p-1 pt-3 px-4 mb-4 bg-body-tertiary rounded-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('network') }}">Network</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('view_profile', ['user' => $user->id]) }}">My Profile</a></li>
                </ol>
            </nav>
        </div>

        <div class="bg-body-tertiary rounded-3">
            <div id="profile_picture_cover" class="profile-heading p-5" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%,rgba(0,0,0,0.75) 100%), url('{{ Storage::url($user->profile_picture) }}');">
                <div class="profile-banner text-center">
                    <img src="{{ Storage::url( $user->profile_picture ) }}" class="img-fluid rounded-circle mb-3" id="profile_picture_header">
                    <h3 class="fw-bold">{{ $user->first_name }} {{ $user->last_name }}</h3>
                    <a href="mailto:{{ $user->email }}?subject=Hey%2C%20I%20saw%20your%20account%20on%20SociaLearn%21">
                        <h6><span id="user_email" class="badge text-bg-light mt-1">{{ $user->email }}</span></h6>
                    </a>
                </div>
            </div>

            <div class="profile-content p-4">
                
                <div class="profile-body my-4">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td>First Name:</td>
                                <td class="fw-bold col-6" id="profile_first_name">{{ $user->first_name }}</td>
                            </tr>
                            <tr>
                                <td>Middle Name:</td>
                                <td class="fw-bold" id="profile_middle_name">{{ $user->middle_name }}</td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td class="fw-bold" id="profile_last_name">{{ $user->last_name }}</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td class="fw-bold" id="profile_email">{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td class="fw-bold" id="profile_address">{{ $user->address }}</td>
                            </tr>
                            <tr>
                                <td>School/Institution Affiliated With:</td>
                                <td class="fw-bold" id="profile_affiliation">{{ $user->affiliation }}</td>
                            </tr>
                            <tr>
                                <td>Birthday:</td>
                                <td class="fw-bold" id="profile_birthday">{{ date('F j, Y', strtotime($user->birthday)) }}</td>
                            </tr>
                            <tr>
                                <td>Gender:</td>
                                <td class="fw-bold" id="profile_birthday">{{ $user->gender }}</td>
                            </tr>
                            <tr>
                                <td>Currently Teaching Courses:</td>
                                <td class="fw-bold">{{ \App\Models\Course::where('created_by', $user->id)->count() }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- End of Content -->
    </div>

    <script>

    </script>

@endsection