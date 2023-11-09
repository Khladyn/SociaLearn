<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\EnrolledCourse;

class CourseController extends Controller
{
    public function displayAll(){
        return view('courses');
    }

    public function createCourseView(){
        return view('create_course');
    }

    public function createCourse(Request $request){

        // Validation
        $data = $request->validate([
            'course_name' => 'required',
            'course_level' => 'required',
            'course_category' => 'required',
            'course_description' => 'required',
            'student_count' => 'nullable',
            'rating' => 'nullable'
        ]);

        $course = Course::create($data);

        return redirect(route('courses'))->with('success', 'Course created successfully');

    }

    public function editCourse(Request $request) {

        // Validation
        $data = $request->validate([
            'course_name' => 'required',
            'course_level' => 'required',
            'course_category' => 'required',
            'course_description' => 'required',
            'student_count' => 'nullable',
            'rating' => 'nullable'
        ]);

        $course->update($data);

        return redirect(route('courses'))->with('success', 'Course updated successfully');
    }
    
    public function deleteCourse(Course $course){

        $course->delete();

        return redirect(route('courses'))->with('success', 'Course deleted successfully');
    }

}
