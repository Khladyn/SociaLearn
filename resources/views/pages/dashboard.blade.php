@extends('layouts.app')

@section('content')

                <!-- Carousel -->
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <a href="#"><img src="{{ asset('img/slides/slide1.jpg') }}" class="d-block w-100" alt="..."></a>
                      </div>
                      <div class="carousel-item">
                        <a href="#"><img src="{{ asset('img/slides/slide2.jpg') }}" class="d-block w-100" alt="..."></a>
                      </div>
                      <div class="carousel-item">
                        <a href="#"><img src="{{ asset('img/slides/slide3.jpg') }}" class="d-block w-100" alt="..."></a>
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
                  <!-- End of Carousel -->

<div class="container-fluid px-lg-5 p-3 min-vh-100">
    <!-- Start of Content -->

        <div class="courses_my my-4">
            <h3 class="fw-bold"> <span class="badge text-bg-dark">MY COURSES</span> </h4>
            <div class="row my-4">
                <!-- Course Card -->
                @foreach($userCourses as $course)
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
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
                                {{-- <small><i class="fas fa-user-friends"></i> {{ $course->enrollment_count }} &nbsp; </small> 
                                <small><i class="fas fa-star"></i> {{ $course->rating }} &nbsp; </small>  --}}
                                <small><i class="far fa-calendar-alt"></i> &nbsp; {{ date('F j, Y', strtotime($course->created_at)) }} &nbsp; </small> 
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                    

            <div class="d-flex justify-content-end">
                <a href="{{ route('my_courses') }}" class="btn bg-success text-light fw-bold">VIEW ALL</a>
            </div>
        </div>

        <div class="row">
            <!-- Enrolled Courses -->
            <div class="col-md-6 courses_enrolled my-4">
                <h3 class="fw-bold"> <span class="badge text-bg-dark">OTHER COURSES</span> </h3>

                @foreach($otherCourses as $course)
                <div class="card shadow my-4">
                    <div class="row g-0">
                        <div class="col-md-4 col-4">
                            <a href="{{ route('show_course', ['course' => $course->id]) }}">
                                <div class="card-thumbnail-left">
                                    <img src="{{ $course->image_header ? Storage::url('course_images/' . $course->image_header) : asset('img/defaults/default_img.png') }}" alt="{{ $course->title }}">
                                </div>
                            </a>
                        </div>
                        <div class="col-md-8 col-8">
                            <div class="card-body">
                                <div class="course-details">
                                    <small class="fw-semibold text-success">{{ $course->category }}</small>
                                    <h5 class="card-title fw-bold">{{ $course->title }}</h5><hr>
                                    <p>{{ $course->description }}</p>
                                    <span class="badge text-bg-dark">{{ $course->level }}</span>
                                </div>
        
                                <div class="course-other-details text-muted mt-3">
                                    {{-- <small><i class="fas fa-user-friends"></i> {{ $course->enrollment_count }} &nbsp; </small> 
                                    <small><i class="fas fa-star"></i> {{ $course->rating }} &nbsp; </small>  --}}
                                    <small><i class="far fa-calendar-alt"></i> &nbsp; {{ date('F j, Y', strtotime($course->created_at)) }} &nbsp; </small> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

                <div class="d-flex justify-content-end">
                    <a href="{{ route('enrolled_courses') }}" class="btn bg-success text-light fw-bold">VIEW ALL</a>
                </div>
            </div>

            <!-- Latest Courses -->
            <div class="col-md-6 courses_enrolled my-4">
                <h3 class="fw-bold"> <span class="badge text-bg-dark">LATEST COURSES</span> </h3>
                
                @foreach($latestCourses as $course)
                <div class="card shadow my-4">
                    <div class="row g-0">
                        <div class="col-md-4 col-4">
                            <a href="{{ route('show_course', ['course' => $course->id]) }}">
                                <div class="card-thumbnail-left">
                                    <img src="{{ $course->image_header ? Storage::url('course_images/' . $course->image_header) : asset('img/defaults/default_img.png') }}" alt="{{ $course->title }}">
                                </div>
                            </a>
                        </div>
                        <div class="col-md-8 col-8">
                            <div class="card-body">
                                <div class="course-details">
                                    <small class="fw-semibold text-success">{{ $course->category }}</small>
                                    <h5 class="card-title fw-bold">{{ $course->title }}</h5><hr>
                                    <p>{{ $course->description }}</p>
                                    <span class="badge text-bg-dark">{{ $course->level }}</span>
                                </div>
            
                                <div class="course-other-details text-muted mt-3">
                                    {{-- <small><i class="fas fa-user-friends"></i> {{ $course->enrollment_count }} &nbsp; </small> 
                                    <small><i class="fas fa-star"></i> {{ $course->rating }} &nbsp; </small>  --}}
                                    <small><i class="far fa-calendar-alt"></i> &nbsp; {{ date('F j, Y', strtotime($course->created_at)) }} &nbsp; </small> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach            
            
            </div>
        </div>

    <!-- End of Content -->
    </div>

@endsection