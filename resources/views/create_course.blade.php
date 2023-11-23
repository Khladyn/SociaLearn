@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" action="{{ route('create.course') }}">
        @csrf
        @method('POST')
        
        <div class="form-group">
            <label for="course_name">Course Name:</label>
            <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Course Name">
        </div>
        
        <div class="form-group">
            <label for="course_level">Course Level:</label>
            <select name="course_level" id="course_level" class="form-control">
                <option value="beginner">Beginner</option>
                <option value="intermediate">Intermediate</option>
                <option value="advanced">Advanced</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="course_category">Course Category:</label>
            <select name="course_category" id="course_category" class="form-control">
                <option value="html">HTML</option>
                <option value="javascript">Javascript</option>
                <option value="php">PHP</option>
                <option value="python">Python</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="course_description">Course Description:</label>
            <textarea id="course_description" name="course_description" rows="4" class="form-control" placeholder="Tell something about the course..."></textarea>
        </div>
        
        <div class="form-group">
            <label for="student_count">Student Count:</label>
            <input type="number" class="form-control" id="student_count" name="student_count" placeholder="Student Count">
        </div>
        
        <div class="form-group">
            <label for="rating">Rating:</label>
            <input type="text" class="form-control" id="rating" name="rating" placeholder="Rating">
        </div>

        <button type="submit" class="btn btn-primary" id="submit" name="submit">Create Course</button>
        <button type="button" class="btn btn-secondary" id="edit" name="edit">Edit Course</button>
        <button type="button" class="btn btn-danger" id="delete" name="delete">Delete Course</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('courseForm');

        document.getElementById('edit').addEventListener('click', function () {
            form.action = "{{ route('edit.course') }}";
            form.method = 'POST'; 
            form.submit();
        });

        document.getElementById('delete').addEventListener('click', function () {
            form.action = "{{ route('delete.course') }}";
            form.method = 'POST'; 
            form.submit();
        });
    });
</script>
@endsection

