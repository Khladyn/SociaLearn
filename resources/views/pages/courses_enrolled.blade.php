@extends('layouts.app')

@section('content')

<div class="container-fluid px-lg-5 p-3 min-vh-100">
    <!-- Start of Content -->
        <div class="courses_my my-4">

            @if($errors->has('success'))
                <div class="alert alert-success">
                    {{ $errors->first('success') }}
                </div>
            @endif
            
            @if($errors->has('error'))
                <div class="alert alert-danger">
                    {{ $errors->first('error') }}
                </div>
            @endif

            <div id="successAlertCourse" class="alert alert-success d-none" role="alert">
                <!-- Success message will be displayed here -->
            </div>

            <div class="p-1 pt-3 px-4 mb-4 bg-body-tertiary rounded-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('enrolled_courses') }}">Other Courses</a></li>
                    </ol>
                </nav>
            </div>

            <div class="row my-4">
                <div class="col-xl-2 col-lg-2 col-md-12 mb-3">
                    <div class="position-sticky" style="top: 7rem;">
                        <nav class="category-nav my-4">
                            <h5 class="fw-bold"> CATEGORIES </h5>
                            <ul class="nav nav-pills flex-md-column" id="category-list">
                            </ul>
                        </nav>
                        <nav class="category-nav my-4">
                            <h5 class="fw-bold"> LEVELS </h5>
                            <ul class="nav nav-pills flex-md-column" id="level-list">
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="col-xl-10 col-lg-10 col-md-12">
                    <div class="row">
                        <h3 class="fw-bold"> <span class="badge text-bg-dark">OTHER COURSES</span> </h4>

                        <div class="form-group my-3 mb-4">
                            <form type="get" action="#">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="search_course" name="search_course" placeholder="Search for a course..." required>
                                    <button class="btn btn-dark fw-bold"> <i class="fas fa-search"></i> </button>
                                </div>
                            </form>
                        </div>

                        <!-- Course Card -->
                        @foreach($courses as $course)
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12 course-card">
                            <div class="card shadow">
                                <a href="{{ route('show_course', ['course' => $course->id]) }}">
                                    <div class="card-thumbnail">
                                        <img src="{{ $course->image_header ? Storage::url('course_images/' . $course->image_header) : asset('img/defaults/default_img.png') }}" class="card-img-top">
                                    </div>
                                </a>
                                <div class="card-body">
                                    <div class="course-details">
                                        <small id="course_category" class="fw-semibold text-success">{{ $course->category }}</small>
                                        <h5 id="course_title" class="card-title fw-bold">{{ $course->title }}</h5><hr>
                                        <p>{{ $course->description }}</p>
                                        <span id="course_level" class="badge text-bg-dark">{{ $course->level }}</span>
                                    </div>
                
                                    <div class="course-other-details text-muted mt-3">
                                        <small><i class="fas fa-chalkboard-teacher"></i>&nbsp; {{ $course->createdBy->first_name }} {{ $course->createdBy->last_name }} &nbsp; </small><br>
                                        {{-- <small><i class="fas fa-star"></i> {{ $course->rating }} &nbsp; </small>  --}}
                                        <small><i class="far fa-calendar-alt"></i> &nbsp; {{ date('F j, Y', strtotime($course->created_at)) }} &nbsp; </small> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{ $courses->links('pagination::bootstrap-5') }}

                </div>
            </div>
        </div>
    <!-- End of Content -->
    </div>

    <script>
        $(document).ready(function() {
            $("#search_course").on("keyup", function() {
                var value = $(this).val().toLowerCase();

                $(".course-card").filter(function() {
                    $(this).toggle($(this).find("#course_title").text().toLowerCase().indexOf(value) > -1)
                });
            });

            // Extract unique categories from courses
            var uniqueCategories = [...new Set(@json($courses->pluck('category')))];

            // Generate category list
            var categoryList = $("#category-list");
            categoryList.empty(); // Clear existing categories

            // Add "All" category
            categoryList.append('<li class="nav-item"><a class="nav-link active" href="#" data-category="All"> All </a></li>');

            // Add individual categories
            uniqueCategories.forEach(function(category) {
                categoryList.append('<li class="nav-item"><a class="nav-link" href="#" data-category="' + category + '"> ' + category + ' </a></li>');
            });

            // Category filter click event
            $("#category-list a").on("click", function(e) {
                e.preventDefault();
                
                // Get the selected category
                var selectedCategory = $(this).data("category");
                console.log(selectedCategory);

                // Update the active state
                $("#category-list a").removeClass("active");
                $(this).addClass("active");

                // Filter course cards based on the selected category
                $(".course-card").each(function() {
                    var category = $(this).find("#course_category").text().trim();
                    var match = selectedCategory === "All" || category === selectedCategory;
                    console.log(category);
                    $(this).toggle(match);
                });
            });

            // Extract unique levels from courses
            var uniqueLevels = [...new Set(@json($courses->pluck('level')))];

            // Generate level list
            var levelList = $("#level-list");
            levelList.empty(); // Clear existing levels

            // Add "All" level
            levelList.append('<li class="nav-item"><a class="nav-link active" href="#" data-level="All"> All </a></li>');

            // Add individual levels
            uniqueLevels.forEach(function(level) {
                levelList.append('<li class="nav-item"><a class="nav-link" href="#" data-level="' + level + '"> ' + level + ' </a></li>');
            });

            // Level filter click event
            $("#level-list a").on("click", function(e) {
                e.preventDefault();
                
                // Get the selected level
                var selectedLevel = $(this).data("level");
                console.log(selectedLevel);

                // Update the active state
                $("#level-list a").removeClass("active");
                $(this).addClass("active");

                // Filter course cards based on the selected level
                $(".course-card").each(function() {
                    var level = $(this).find("#course_level").text().trim();
                    var match = selectedLevel === "All" || level === selectedLevel;
                    console.log(level);
                    $(this).toggle(match);
                });
            });
        });
    </script>

@endsection