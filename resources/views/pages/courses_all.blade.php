@extends('layouts.app')

@section('content')

<div class="container-fluid px-lg-5 p-3 min-vh-100">
    <!-- Start of Content -->
        <div class="courses_my my-4">

            <div class="p-1 pt-3 px-4 mb-4 bg-body-tertiary rounded-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page"><a href="courses_all.html">All Courses</a></li>
                    </ol>
                </nav>
            </div>

            <div class="row my-4">
                <div class="col-xl-2 col-lg-2 col-md-12 mb-3">
                    <div class="position-sticky" style="top: 7rem;">
                        <nav class="category-nav my-4">
                            <h5 class="fw-bold"> CATEGORIES </h5>
                            <ul class="nav nav-pills flex-md-column">
                                <li class="nav-item"> <a class="nav-link active" href="#"> All </a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#"> Web Development </a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#"> Data Science </a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#"> Graphic Design </a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#"> Mobile App Development </a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#"> UI/UX Design </a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#"> Video Editing </a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#"> Language and Speech </a> </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="col-xl-10 col-lg-10 col-md-12">
                    <div class="row">
                        <h3 class="fw-bold"> <span class="badge text-bg-dark">ALL COURSES</span> </h4>

                        <div class="form-group my-3 mb-4">
                            <form type="get" action="#">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="#" name="#" placeholder="Search for a course..." required>
                                    <button class="btn btn-dark fw-bold"> <i class="fas fa-search"></i> </button>
                                </div>
                            </form>
                        </div>
                        <!-- Course Card -->
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="card shadow">
                                <a href="courses_all_view.html">
                                    <div class="card-thumbnail">
                                        <img src="assets/img/cards/card_9.jpg" class="card-img-top">
                                    </div>
                                </a>
                                <div class="card-body">
                                    <div class="course-details">
                                        <small class="fw-semibold text-success">Graphic Design</small>
                                        <h5 class="card-title fw-bold">Maximizing the potential of Canva</h5><hr>
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

                    <nav class="mb-5">
                        <ul class="pagination justify-content-end">
                            <li class="page-item disabled">
                                <a class="page-link"><i class="fas fa-caret-left"></i></a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fas fa-caret-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    <!-- End of Content -->
    </div>

    @endsection