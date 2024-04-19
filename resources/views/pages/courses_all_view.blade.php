@extends('layouts.app')

@section('content')

<div class="container-fluid px-lg-5 p-3 min-vh-100">
    <!-- Start of Content -->
        <div class="courses_my my-4">

            <div class="p-1 pt-3 px-4 mb-4 bg-body-tertiary rounded-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="courses_all.html">All Courses</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="courses_all_view.html">Maximizing the potential of Canva</a></li>
                    </ol>
                </nav>
            </div>

            <div class="bg-body-tertiary rounded-3">
                <div class="course-heading p-5" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.4) 0%,rgba(0,0,0,0.9) 100%), url('assets/img/cards/card_9.jpg');">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <img class="img-fluid rounded" src="assets/img/cards/card_9.jpg" width="100%">
                        </div>
          
                        <div class="col-md-8">
                            <div class="course-details">
                                <h5 class="fw-semibold"><span class="badge text-bg-success">Graphic Design</span></h5>
                                <h4 class="card-title fw-bold">Maximizing the potential of Canva</h4><hr>
                                <h5>Instructor: Arnold Clavio</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor...</p>
                                <span class="badge text-bg-light">Intermediate</span>
                            </div>

                            <div class="course-other-details text-light mt-3">
                                <small><i class="fas fa-user-friends"></i> 150 &nbsp; </small> 
                                <small><i class="fas fa-star"></i> 4.5 &nbsp; </small> 
                                <small><i class="far fa-calendar-alt"></i> &nbsp; 12/06/2023 &nbsp; </small> 
                            </div>
                        </div>
                    </div>
                </div>

                <div class="course-content p-4">

                    <div class="d-flex justify-content-start">
                        <button class="btn btn-sm btn-dark me-1" data-bs-toggle="modal" data-bs-target="#enrollCourse">Enroll Course</button>
                    </div>
                    
                    <div class="course-body my-4">
                        <div class="disclaimer fw-bold text-center text-muted">
                            <h3> Course content locked.</h3>
                            <p>Enroll to this course first to access all course content. </p>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        
        </div>


        <div class="other-courses mt-4 mb-3">

            <div class="row">
                <h3 class="fw-bold my-4"> <span class="badge text-bg-dark">YOU MIGHT ALSO LIKE THESE COURSES</span> </h3>

                <!-- Course Card -->
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card shadow">
                        <a href="courses_all_view.html">
                            <div class="card-thumbnail">
                                <img src="assets/img/cards/card_10.jpg" class="card-img-top">
                            </div>
                        </a>
                        <div class="card-body">
                            <div class="course-details">
                                <small class="fw-semibold text-success">Web Development</small>
                                <h5 class="card-title fw-bold">CSS Hacks 101</h5><hr>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor...</p>
                                <span class="badge text-bg-dark">Beginner</span>
                                <span class="badge text-bg-warning">Open</span>
                            </div>

                            <div class="course-other-details text-muted mt-3">
                                <small><i class="fas fa-user-friends"></i> 150 &nbsp; </small> 
                                <small><i class="fas fa-star"></i> 4.5 &nbsp; </small> 
                                <small><i class="far fa-calendar-alt"></i> &nbsp; 12/06/2023 &nbsp; </small> 
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card shadow">
                        <a href="courses_all_view.html">
                            <div class="card-thumbnail">
                                <img src="assets/img/cards/card_11.jpg" class="card-img-top">
                            </div>
                        </a>
                        <div class="card-body">
                            <div class="course-details">
                                <small class="fw-semibold text-success">Language and Speech</small>
                                <h5 class="card-title fw-bold">Public Speaking</h5><hr>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor...</p>
                                <span class="badge text-bg-dark">Intermediate</span>
                                <span class="badge text-bg-warning">Open</span>
                            </div>

                            <div class="course-other-details text-muted mt-3">
                                <small><i class="fas fa-user-friends"></i> 150 &nbsp; </small> 
                                <small><i class="fas fa-star"></i> 4.5 &nbsp; </small> 
                                <small><i class="far fa-calendar-alt"></i> &nbsp; 12/06/2023 &nbsp; </small> 
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card shadow">
                        <a href="courses_all_view.html">
                            <div class="card-thumbnail">
                                <img src="assets/img/cards/card_12.jpg" class="card-img-top">
                            </div>
                        </a>
                        <div class="card-body">
                            <div class="course-details">
                                <small class="fw-semibold text-success">Data Science</small>
                                <h5 class="card-title fw-bold">Introduction to Big Data</h5><hr>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor...</p>
                                <span class="badge text-bg-dark">Intermediate</span>
                                <span class="badge text-bg-danger">Closed</span>
                            </div>

                            <div class="course-other-details text-muted mt-3">
                                <small><i class="fas fa-user-friends"></i> 150 &nbsp; </small> 
                                <small><i class="fas fa-star"></i> 4.5 &nbsp; </small> 
                                <small><i class="far fa-calendar-alt"></i> &nbsp; 12/06/2023 &nbsp; </small> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    <!-- End of Content -->
    </div>
    
    <!-- Enroll Course Modal -->
    <div class="modal fade" id="enrollCourse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fw-bold fs-5" id="staticBackdropLabel">Enroll Course</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p> You are about to enroll to [insert course title here]. Are you sure you want to enroll this course? </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-success rounded-pill fw-bold me-1" type="submit"> Yes</button>
                    <button class="btn btn-sm btn-danger rounded-pill fw-bold" type="button" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

@endsection