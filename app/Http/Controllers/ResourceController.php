<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource;
use App\Models\EnrolledResource;

class ResourceController extends Controller
{
    public function displayAll(){
        return view('courseview');
    }

    public function createResourceView(){
        return view('create_resource');
    }

    public function createResource(Request $request){

        // Validation
        $data = $request->validate([
            'course_id' => 'required',
            'user_id' => 'required',
            'resource_name' => 'required',
            'resource_type' => 'required',
            'resource_points' => 'required',
            'resource_views' => 'required'
        ]);

        $resource = Resource::create($data);

        return redirect(route('courseview'))->with('success', 'Resource created successfully');

    }

    public function editResource(Request $request) {

        // Validation
        $data = $request->validate([
            'course_id' => 'required',
            'user_id' => 'required',
            'resource_name' => 'required',
            'resource_type' => 'required',
            'resource_points' => 'required',
            'resource_views' => 'required'
        ]);

        $resource->update($data);

        return redirect(route('courseview'))->with('success', 'Resource updated successfully');
    }
    
    public function deleteResource(Resource $Resource){

        $resource->delete();

        return redirect(route('courseview'))->with('success', 'Resource deleted successfully');
    }

}
