@extends('layouts.app')

@section('content')

<div class="container-fluid px-lg-5 p-3 min-vh-100">
    <!-- Start of Content -->
        <div class="courses_my my-4">

            <div class="p-1 pt-3 px-4 mb-4 bg-body-tertiary rounded-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ $viewingOwnCourse ? route('my_courses') : route('enrolled_courses') }}">{{ $viewingOwnCourse ? 'My Courses' : 'Other Courses' }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('show_course', ['course' => $course->id]) }}">{{ $course->title }}</a></li>
                    </ol>
                </nav>
            </div>

            <div class="bg-body-tertiary rounded-3">
                <div class="course-heading p-5" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.4) 0%,rgba(0,0,0,0.9) 100%), url('{{ $course->image_header ? Storage::url('course_images/' . $course->image_header) : asset('img/defaults/default_img.png') }}');">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <img class="img-fluid rounded" src="{{ $course->image_header ? Storage::url('course_images/' . $course->image_header) : asset('img/defaults/default_img.png') }}" width="100%" alt="Course Image">
                        </div>
            
                        <div class="col-md-8">
                            <div class="course-details">
                                <h5 class="fw-semibold"><span class="badge text-bg-success">{{ $course->category }}</span></h5>
                                <h4 class="card-title fw-bold">{{ $course->title }}</h4><hr>
                                <p>{{ $course->description }}</p>
                                <span class="badge text-bg-light">{{ $course->level }}</span>
                            </div>
            
                            <div class="course-other-details text-light mt-3">
                                <small><i class="fas fa-chalkboard-teacher"></i>&nbsp; {{ $course->createdBy->first_name }} {{ $course->createdBy->last_name }} &nbsp; </small><br>
                                <small><i class="far fa-calendar-alt"></i> &nbsp;{{ date('F j, Y', strtotime($course->created_at)) }} &nbsp; </small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="course-content p-4">
                    @if($course->created_by == auth()->user()->id)
                    <div class="d-flex justify-content-start">
                        <button class="btn btn-sm btn-dark me-1 edit-course" data-bs-toggle="modal" data-bs-target="#editCourse">Edit Course</button>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCourse">Delete Course</button>
                    </div>
                    @endif
                    <div class="course-body my-4">
                        <nav class="category-nav my-4">
                            <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page"  href="#resources">Resources</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link"  href="#students">Students Enrolled</a>
                                </li> --}}
                            </ul>
                        </nav>

                        <div class="content">
                            <div id="resources-content" class="content-container">
                                @if($resources->where('course_id', $course->id)->isEmpty() && $course->created_by != auth()->user()->id)
                                <p class="alert alert-secondary text-center">No resources for this course yet</p>
                                @else                           
                                <div class="row">
                                    @foreach ($resources as $resource)
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="card shadow">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#viewResource_{{ $resource->id }}">
                                                <div class="card-thumbnail">
                                                    <img src="{{ $resource->thumbnail_path ? Storage::url($resource->thumbnail_path) : asset('img/defaults/default_img.png') }}" class="card-img-top" alt="Thumbnail">
                                                </div>
                                            </a>
                                            <div class="card-body">
                                                <div class="course-details">
                                                    <small class="fw-semibold text-dark">{{ $resource->type }}</small>
                                                    <h5 class="card-title fw-bold">{{ $resource->title }}</h5><hr>
                                                    <div class="d-flex">
                                                        {{-- <button class="btn btn-sm btn-dark me-1 w-50" data-bs-toggle="modal" data-bs-target="#editResource">Edit Resource</button> --}}
                                                        @if($resource->user_id == auth()->user()->id)
                                                        <button class="btn btn-sm btn-danger w-100" data-bs-toggle="modal" data-bs-target="#deleteResource_{{ $resource->id }}">Delete Resource</button>
                                                        @else
                                                        <button class="btn btn-sm btn-success w-100" data-bs-toggle="modal" data-bs-target="#viewResource_{{ $resource->id }}">View Resource</button>                                              
                                                        @endif
                                                    </div>  
                                                </div>
                                                <div class="course-other-details text-muted mt-3">
                                                    <small><i class="far fa-calendar-alt"></i> &nbsp; {{ date('F j, Y', strtotime($course->created_at)) }} &nbsp; </small> 
                                                    {{-- <small><i class="fas fa-eye"></i> {{ $resource->views }} &nbsp; </small>  --}}
                                                    {{-- <small class="text-success"><i class="fas fa-flag"></i> {{ $resource->points }} points &nbsp; </small> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- View Resource Modal -->
                                    @include('modals.view_resource')

                                    <!-- Delete Resource Modal -->
                                    @include('modals.delete_resource')
                                @endforeach
                                @if($course->created_by == auth()->user()->id)
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                                        <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#addResource">
                                            <div class="card shadow">         
                                                <div class="card-body">
                                                    <div class="add-resource">
                                                        <i class="fas fa-plus text-muted"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                                </div>
                            @endif
                            </div>

                            <div id="students-content" class="content-container" style="display: none;">
                                <div class="table-responsive mt-3 mb-5">
                                    <table class="table sl-table table-hover" id="sl-network">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Profile Picture</th>
                                                <th>Name</th>
                                                <th>E-mail Address</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>100</td>
                                                <td><img src="assets/img/defaults/default_avatar.jpg" width="100" class="rounded-circle"></td>
                                                <td>Humpty Dumpty</td>
                                                <td>humptydumpty@gmail.com</td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <a href="#" class="btn btn-sm btn-dark rounded-3 fw-bold me-1" type="button">Add Friend</a>
                                                        <a href="#" class="btn btn-sm btn-dark rounded-3 fw-bold me-1" type="button">Message</a>
                                                        <a href="#" class="btn btn-sm btn-dark rounded-3 fw-bold" type="button">View</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>99</td>
                                                <td><img src="assets/img/defaults/default_avatar.jpg" width="100" class="rounded-circle"></td>
                                                <td>Humpty Dumpty</td>
                                                <td>humptydumpty@gmail.com</td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <a href="#" class="btn btn-sm btn-dark rounded-3 fw-bold me-1" type="button">Add Friend</a>
                                                        <a href="#" class="btn btn-sm btn-dark rounded-3 fw-bold me-1" type="button">Message</a>
                                                        <a href="#" class="btn btn-sm btn-dark rounded-3 fw-bold" type="button">View</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                    </div>
                    
                </div>
            </div>
        
        </div>

        <!-- Edit Course Modal -->
        @include('modals.edit_course')

        <!-- Delete Course Modal -->
        @include('modals.delete_course')

        <!-- Delete Course Modal -->
        @include('modals.create_resource')

        <div class="other-courses mt-4 mb-3">

            <div class="row">
                <h3 class="fw-bold my-4">
                    <span class="badge text-bg-dark">
                        {{ $viewingOwnCourse ? 'YOUR OTHER COURSES' : 'OTHER COURSES BY THIS TUTOR' }}
                    </span>
                </h3>                

                {{-- Related Courses --}}
                @foreach($courses as $course)
                @if($course->created_by == $authorId) 
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card shadow">
                        <a href="{{ route('show_course', ['course' => $course->id]) }}">
                            <div class="card-thumbnail">
                                <img src="{{ $course->image_header ? Storage::url('course_images/' . $course->image_header) : asset('img/defaults/default_img.png') }}" class="card-img-top">
                            </div>
                        </a>
                        <div class="card-body">
                            <div class="course-details">
                                <small class="fw-semibold text-success">{{ $course->category }}</small>
                                <h5 class="card-title fw-bold">{{ $course->title }}</h5><hr>
                                <p>{{ $course->description }}</p>
                                <span class="badge text-bg-dark">{{ $course->level }}</span>
                            </div>
        
                            <div class="course-other-details text-muted mt-3">
                                <small><i class="fas fa-chalkboard-teacher"></i>&nbsp; {{ $course->createdBy->first_name }} {{ $course->createdBy->last_name }} &nbsp; </small><br>
                                {{-- <small><i class="fas fa-user-friends"></i> {{ $course->enrollment_count }} &nbsp; </small>  --}}
                                {{-- <small><i class="fas fa-star"></i> {{ $course->rating }} &nbsp; </small>  --}}
                                <small><i class="far fa-calendar-alt"></i> &nbsp; {{ date('F j, Y', strtotime($course->created_at)) }} &nbsp; </small> 
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
            </div>

        </div>

    <!-- End of Content -->
    </div>

        <script>

            $(document).ready(function () {
                // Show the initial content based on the active tab
                showContent("resources");

                // Handle tab click events
                $('.nav-link').on('click', function (e) {
                    e.preventDefault();

                    // Get the target tab id
                    var targetTab = $(this).attr('href').substring(1);

                    // Show content based on the selected tab
                    showContent(targetTab);

                    // Update the active tab
                    $('.nav-link').removeClass('active');
                    $(this).addClass('active');
                });

                function showContent(tabId) {
                    // Hide all content containers
                    $('.content-container').hide();

                    // Show the content container based on the selected tab
                    $('#' + tabId + '-content').show();
                }
            });
        </script>

@endsection