<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" action="{{route('create.course')}}">
        @csrf
        <div class="form-group">
            <label for="course_name">Course Name:</label>
            <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Course Name">
        </div>
        <div>
            <label for="course_level">Course Level:</label>
            <select name="course_level" id="course_level">
                <option value="beginner">Beginner</option>
                <option value="intermediate">Intermediate</option>
                <option value="advanced">Advanced</option>
            </select>
        </div>
        <div>
            <label for="course_category">Course Category:</label>
            <select name="course_category" id="course_category">
                <option value="html">HTML</option>
                <option value="javascript">Javascript</option>
                <option value="php">PHP</option>
                <option value="python">Python</option>
            </select>
        </div>
        <div>
            <label for="course_description">Course Description:</label>
            <textarea id="course_description" name="course_description" rows="4" cols="50">
                Tell something about the course...
            </textarea>
        
        </div>
        <div>
            <label for="student_count">Student Count:</label>
            <input type="number" class="form-control" id="student_count" name="student_count" placeholder="Student Count">
        </div>
        <div>
            <label for="rating">Rating:</label>
            <input type="text" class="form-control" id="rating" name="rating" placeholder="Rating">
        </div>
        <input type="submit" id="submit" name="submit" value="Create Course">
    </form>
</body>
</html>