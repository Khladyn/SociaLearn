<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;

class SessionController extends Controller
{
    public function displayAll(){
        return view('courseview');
    }

    public function createSessionView(){
        return view('create_session');
    }

    public function createSession(Request $request){

        // Validation
        $data = $request->validate([
            'course_id' => 'required',
            'user_id' => 'required',
            'session_name' => 'required',
            'session_link' => 'required',
            'session_points' => 'required',
            'session_views' => 'required'
        ]);

        $Session = Session::create($data);

        return redirect(route('courseview'))->with('success', 'Session created successfully');

    }

    public function editSession(Request $request) {

        // Validation
        $data = $request->validate([
            'course_id' => 'required',
            'user_id' => 'required',
            'session_name' => 'required',
            'session_type' => 'required',
            'session_points' => 'required',
            'session_views' => 'required'
        ]);

        $Session->update($data);

        return redirect(route('courseview'))->with('success', 'Session updated successfully');
    }
    
    public function deleteSession(Session $Session){

        $Session->delete();

        return redirect(route('courseview'))->with('success', 'Session deleted successfully');
    }
}
