<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function getMessages()
    {
        // Fetch chat messages
        $messages = ChatMessage::with('sender', 'recipient')
            ->where(function ($query) {
                $query->where('sender_id', Auth::id())
                    ->orWhere('recipient_id', Auth::id());
            })
            ->orderBy('created_at', 'asc')
            ->get();

        return view('modals.chat', compact('messages'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'recipient_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        // Create a new chat message
        ChatMessage::create([
            'sender_id' => Auth::id(),
            'recipient_id' => $request->input('recipient_id'),
            'message' => $request->input('message'),
        ]);

        return redirect()->route('modals.chat');
    }

    public function sendMessage(Request $request)
    {
        // Validate the request if necessary

        // Create a new message
        $message = new ChatMessage();
        $message->message = $request->input('message');
        $message->sender_id = auth()->user()->id;
        $message->recipient_id = $request->input('recipient_id'); // Set the recipient ID accordingly
        $message->save();

        // You can return a response if needed
        return response()->json(['message' => 'Message sent successfully']);
    }


    public function markAsRead(Request $request)
    {
        $messageIds = $request->input('message_ids', []);

        if (!empty($messageIds)) {
            $userId = auth()->id();

            // Mark all specified messages as read
            $updatedRows = ChatMessage::whereIn('id', $messageIds)
                ->where('recipient_id', $userId)
                ->where('is_read', 0)
                ->update(['is_read' => 1]);

            if ($updatedRows > 0) {
                return response()->json(['success' => true]);
            }
        }

        return response()->json(['success' => false]);
    }
}
