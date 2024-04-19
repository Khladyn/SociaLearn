@extends('layouts.app')

@section('content')

<div class="container-fluid px-lg-5 p-3 min-vh-100">
    <!-- Start of Content -->
    <div class="profile my-4">

        <div class="p-1 pt-3 px-4 mb-4 bg-body-tertiary rounded-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('profile') }}">My Profile</a></li>
                </ol>
            </nav>
        </div>

        <div class="bg-body-tertiary rounded-3">
            <div id="profile_picture_cover" class="profile-heading p-5" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%,rgba(0,0,0,0.75) 100%), url('{{ Storage::url(auth()->user()->profile_picture) }}');">
                <div class="profile-banner text-center">
                    <img src="{{ Storage::url(auth()->user()->profile_picture) }}" class="img-fluid rounded-circle mb-3" id="profile_picture_header">
                    <h3 class="fw-bold">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h3>
                    <a href="mailto:{{ auth()->user()->email }}?subject=Hey%2C%20I%20saw%20your%20account%20on%20SociaLearn%21">
                        <h6><span id="user_email" class="badge text-bg-light mt-1">{{ auth()->user()->email }}</span></h6>
                    </a>
                </div>
            </div>

            <div class="profile-content p-4">
                <div class="d-flex justify-content-start">
                    <button class="btn btn-sm btn-dark me-1" data-bs-toggle="modal" data-bs-target="#editProfile">Edit Profile</button>
                    <button class="btn btn-sm btn-dark me-1" data-bs-toggle="modal" data-bs-target="#changePwd">Change Password</button>
                    <button class="btn btn-sm btn-dark me-1" data-bs-toggle="modal" data-bs-target="#changeEmail">Change E-mail Address</button>
                    <button class="btn btn-sm btn-danger me-1" data-bs-toggle="modal" data-bs-target="#deleteAccount">Delete Account</button>
                </div>
                
                <div class="profile-body my-4">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td>First Name:</td>
                                <td class="fw-bold col-6" id="profile_first_name">{{ auth()->user()->first_name }}</td>
                            </tr>
                            <tr>
                                <td>Middle Name:</td>
                                <td class="fw-bold" id="profile_middle_name">{{ auth()->user()->middle_name }}</td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td class="fw-bold" id="profile_last_name">{{ auth()->user()->last_name }}</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td class="fw-bold" id="profile_email">{{ auth()->user()->email }}</td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td class="fw-bold" id="profile_address">{{ auth()->user()->address }}</td>
                            </tr>
                            <tr>
                                <td>School/Institution Affiliated With:</td>
                                <td class="fw-bold" id="profile_affiliation">{{ auth()->user()->affiliation }}</td>
                            </tr>
                            <tr>
                                <td>Birthday:</td>
                                <td class="fw-bold" id="profile_birthday">{{ date('F j, Y', strtotime(auth()->user()->birthday)) }}</td>
                            </tr>
                            <tr>
                                <td>Gender:</td>
                                <td class="fw-bold" id="profile_birthday">{{ auth()->user()->gender }}</td>
                            </tr>
                            <tr>
                                <td>Currently Teaching Courses:</td>
                                <td class="fw-bold">{{ \App\Models\Course::where('created_by', auth()->user()->id)->count() }}</td>
                            </tr>
                            {{-- <tr>
                                <td>Currently Enrolled Courses:</td>
                                <td class="fw-bold">12</td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- End of Content -->
    </div>

    <!-- Edit Profile Modal -->
    @include('modals.edit_profile')

    <!-- Change Password Modal -->
    @include('modals.edit_password')

    <!-- Change E-mail Modal -->
    @include('modals.edit_email')

    <!-- Delete Account -->
    @include('modals.delete_account')

    <script>

    </script>

@endsection