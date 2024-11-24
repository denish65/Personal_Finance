<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    //

    public function index()
    {

        return view('admin.chatroom');
    }

    public function fetchMessages()
    {
        return Chat::with('user')->latest()->take(50)->get()->reverse();
    }

    // Store a new chat message
    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:500',
        ]);

        $chat = Chat::create([
            'user_id' => auth()->id(),
            'message' => $validated['message'],
        ]);

        return response()->json($chat, 201);
    }
}
