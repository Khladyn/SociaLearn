@extends('layouts.app')

@section('content')

<div class="container-fluid px-lg-5 p-3 min-vh-100">
    <!-- Start of Content -->
        <div class="courses_my my-4">

            <div class="p-1 pt-3 px-4 mb-4 bg-body-tertiary rounded-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('my_courses') }}">My Courses</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('create_course') }}">Create Course</a></li>
                    </ol>
                </nav>
            </div>

            <div class="bg-body-tertiary rounded-3">
                <div class="course-content p-4">
                    <h4> Create Course </h4>

                    <form method="post" action="{{ route('create_course') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 my-2">
                                <label> Image Header: </label>
                                <input class="form-control" type="file" id="image_header" name="image_header">
                                <small><i> (If left blank, default image header will be used) </i></small>
                                @error('image_header')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 my-2">
                                <label> Title: *</label>
                                <input type="text" name="title" id="title" class="form-control rounded" placeholder="Enter course title here..." required>
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 my-2">
                                <label> Description: *</label>
                                <textarea name="description" id="description" class="form-control rounded" rows="4" required></textarea>
                                @error('description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 my-2">
                                <label> Category: *</label>
                                <select class="form-select rounded" name="category" id="category" required>
                                    <option value="" selected disabled>Select Course Category</option>
                                    <option value="Web Development">Web Development</option>
                                    <option value="Data Science">Data Science</option>
                                    <option value="Graphic Design">Graphic Design</option>
                                    <option value="Mobile App Development">Mobile App Development</option>
                                    <option value="UI/UX Design">UI/UX Design</option>
                                    <option value="Video Editing">Video Editing</option>
                                    <option value="Language and Speech">Language and Speech</option>
                                </select>
                                @error('category')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 my-2">
                                <label> Level: *</label>
                                <select class="form-select rounded" name="level" id="level" required>
                                    <option value="" selected disabled>Select Course Level</option>
                                    <option value="Beginner">Beginner</option>
                                    <option value="Intermediate">Intermediate</option>
                                    <option value="Advanced">Advanced</option>
                                </select>
                                @error('level')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end my-3">
                            <button class="btn btn-success rounded-pill fw-bold w-25 me-1" type="submit"> Create</button>
                            <button class="btn btn-danger rounded-pill fw-bold w-25" type="reset"> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <!-- End of Content -->
    </div>

@endsection