<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;

class ChatController extends Controller
{
    public function displayAll(){
        return view('chats');
    }

    public function createChat(Request $request){

        // Validation
        $data = $request->validate([
            'user_id' => 'required',
            'recipient_id' => 'required',
            'chat_body' => 'required'
        ]);

        $chat = Chat::create($data);

        return redirect(route('chats'))->with('success', 'Chat created successfully');

    }
    
    public function deleteChat(Chat $chat){

        $chat->delete();

        return redirect(route('chats'))->with('success', 'Chat deleted successfully');
    }
}
