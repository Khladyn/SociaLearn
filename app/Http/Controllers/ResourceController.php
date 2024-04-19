<?php

// app/Http/Controllers/ResourceController.php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::all();
        return view('pages.courses_my_view', compact('resources'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate(Resource::validationRules());
        } catch (ValidationException $e) {
            // If validation fails, return the validation errors as JSON
            return response()->json(['errors' => $e->validator->errors()], 422);
        }        

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail_file')) {
            $thumbnailName = uniqid('thumbnail_', true) . '.' . $request->file('thumbnail_file')->getClientOriginalExtension();
            $thumbnailPath = $request->file('thumbnail_file')->storeAs('public/resources/thumbnails', $thumbnailName);
        } else {
            $thumbnailPath = null;
        }

        // Handle content file upload
        if ($request->hasFile('resource_file')) {
            $contentName = uniqid('resource_', true) . '.' . $request->file('resource_file')->getClientOriginalExtension();
            $contentFilePath = $request->file('resource_file')->storeAs('public/resources', $contentName);
        } else {
            $contentFilePath = null;
        }
        // Merge file paths into the request data
        $request->merge([
            'thumbnail_path' => $thumbnailPath,
            'file_path' => $contentFilePath,
        ]);

        Resource::create($request->all());

        // You can customize the success message
        $message = 'Resource added successfully!';

        return response()->json(['message' => $message]);
    }

    public function update(Request $request, Resource $resource)
    {
        // Similar validation as store method

        $request->validate([
            // ... (same validation rules as in the store method)
        ]);

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail_file')) {
            $thumbnailName = uniqid('thumbnail_', true) . '.' . $request->file('thumbnail_file')->getClientOriginalExtension();
            $thumbnailPath = $request->file('thumbnail_file')->storeAs('public/resources/thumbnails', $thumbnailName);
            $resource->update(['thumbnail_path' => $thumbnailPath]);
        }

        // Handle content file upload
        $contentName = uniqid('resource_', true) . '.' . $request->file('resource_file')->getClientOriginalExtension();
        $contentFilePath = $request->file('resource_file')->storeAs('public/resources', $contentName);

        // Merge file paths into the request data
        $request->merge(['file_path' => $contentFilePath]);

        $resource->update($request->all());

        return redirect()->route('show_course')->with('success', 'Resource updated successfully.');
    }

    public function destroy(Resource $resource)
    {
        $courseId = $resource->course_id;
    
        $resource->delete();
    
        return redirect()->route('show_course', ['course' => $courseId])->with('success', 'Resource deleted successfully.');
    }
}
