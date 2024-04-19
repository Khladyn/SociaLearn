<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        // Get the logged-in user
        $user = auth()->user();
    
        // Retrieve courses created by the logged-in user
        $courses = Course::where('created_by', $user->id)->paginate(6);
    
        return view('pages.courses_my', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate(Course::validationRules());

        $course = Course::create($request->except('_token', 'image_header') + ['created_by' => auth()->id()]);

        if ($request->hasFile('image_header')) {
            // Generate a unique name for the file
            $imageName = uniqid('course_', true) . '.' . $request->file('image_header')->getClientOriginalExtension();
        
            // Store the file in the specified directory
            $imagePath = $request->file('image_header')->storeAs('public/course_images', $imageName);
        
            // Update the course with the image path
            $course->update(['image_header' => $imageName]);
        }

        return redirect()->route('my_courses')->withErrors(['success' => 'Course successfully created!']);
    }

    public function show(Course $course)
    {
        // Get the author ID from the course being viewed
        $authorId = $course->created_by;
    
        // Load other courses (excluding the current one)
        $courses = Course::where('id', '!=', $course->id)->limit(3)->get();
    
        // Retrieve resources for the current course
        $resources = Resource::where('course_id', $course->id)->get();
    
        // Check if the current user is viewing their own course
        $viewingOwnCourse = auth()->user()->id == $authorId;
    
        return view('pages.courses_my_view', compact('course', 'courses', 'resources', 'viewingOwnCourse', 'authorId'));
    }
    
    

    public function showDashboard()
    {
        // Assuming you have the authenticated user
        $user = auth()->user();
    
        // Get four courses created by the logged-in user
        $userCourses = Course::where('created_by', $user->id)->take(4)->get();
    
        // Get four courses created by other users
        $otherCourses = Course::where('created_by', '!=', $user->id)->take(4)->get();
    
        // Get the latest courses (most recent)
        $latestCourses = Course::latest()->take(4)->get();
    
        return view('pages.dashboard', compact('userCourses', 'otherCourses', 'latestCourses'));
    }

    public function showOtherCourses()
    {
        // Assuming you have the authenticated user
        $user = auth()->user();
    
        // Get four courses created by other users
        $courses = Course::where('created_by', '!=', $user->id)->paginate(6);

        return view('pages.courses_enrolled', compact('courses'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate(Course::validationRules($course->id));

        // Delete the old profile picture
        if ($course->image_header) {
            Storage::delete('course_images/' . $course->image_header);
        }        

        $course->update($request->except('_token', '_method', 'image_header') + ['created_by' => auth()->id()]);

        if ($request->hasFile('image_header')) {
            // Generate a unique name for the file
            $imageName = uniqid('course_', true) . '.' . $request->file('image_header')->getClientOriginalExtension();
        
            // Store the file in the specified directory
            $imagePath = $request->file('image_header')->storeAs('public/course_images', $imageName);
        
            // Update the course with the image path
            $course->update(['image_header' => $imageName]);
        }

            // You can customize the success message
            $message = 'Course updated successfully!';

        return response()->json(['message' => $message]);

    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('my_courses')->withErrors(['success' => 'Course deleted successfully']);

    }
}
