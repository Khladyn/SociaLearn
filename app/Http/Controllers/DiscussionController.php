<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discussion;

class DiscussionController extends Controller
{
    public function displayAll(){
        return view('courseview');
    }

    public function createDiscussionView(){
        return view('create_discussion');
    }

    public function createDiscussion(Request $request){

        // Validation
        $data = $request->validate([
            'course_id' => 'required',
            'user_id' => 'required',
            'replied_discussion_id' => 'nullable', 
            'topic_header' => 'nullable', 
            'topic_body' => 'required',
            'topic_reply_count' => 'required',
            'topic_upvote_count' => 'required',
            'topic_downvote_count' => 'required',
        ]);

        $discussion = Discussion::create($data);

        return redirect(route('courseview'))->with('success', 'Discussion created successfully');

    }

    public function editDiscussion(Request $request) {

        // Validation
        $data = $request->validate([
            'course_id' => 'required',
            'user_id' => 'required',
            'replied_discussion_id' => 'nullable', 
            'topic_header' => 'nullable', 
            'topic_body' => 'required',
            'topic_reply_count' => 'required',
            'topic_upvote_count' => 'required',
            'topic_downvote_count' => 'required',
        ]);

        $discussion->update($data);

        return redirect(route('courseview'))->with('success', 'Discussion updated successfully');
    }
    
    public function deleteDiscussion(Discussion $Discussion){

        $discussion->delete();

        return redirect(route('courseview'))->with('success', 'Discussion deleted successfully');
    }
}
