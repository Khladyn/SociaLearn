<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;

// use Illuminate\Http\Request;
// use App\Models\Chat;

class ChatController extends Controller
{
//     public function displayAll(){
//         return view('chats');
//     }

//     public function createChat(Request $request){

//         // Validation
//         $data = $request->validate([
//             'user_id' => 'required',
//             'recipient_id' => 'required',
//             'chat_body' => 'required'
//         ]);

//         $chat = Chat::create($data);

//         return redirect(route('chats'))->with('success', 'Chat created successfully');

//     }
    
//     public function deleteChat(Chat $chat){

//         $chat->delete();

//         return redirect(route('chats'))->with('success', 'Chat deleted successfully');
//     }

// app/Http/Controllers/ChatsController.php

    public function __construct()
    {
    $this->middleware('auth');
    }

    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    return view('chat');
    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages()
    {
    return Message::with('user')->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
    $user = Auth::user();

    $message = $user->messages()->create([
        'message' => $request->input('message')
    ]);

    broadcast(new MessageSent($user, $message))->toOthers();

    return ['status' => 'Message Sent!'];
    }

}


