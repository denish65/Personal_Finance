<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; // Add this import
use App\Http\Controllers\Controller\admin\AuthController;
use App\Models\Chat;



class ChatController extends Controller
{
    //

    protected $AuthController;
    public function __cunstruct()
    {

        $this->AuthController = new AuthController();
    }

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

        // $sdata = $this->AuthController->getcurruntsession();
        // // $session = Session('admin');
        // dd($sdata);
        

        
        $validated = $request->validate([
            'message' => 'required|string|max:500',
        ]);

        $chat = Chat::create([
            // 'user_id' => auth()->id(),
            'user_id' => 1,

            'message' => $validated['message'],
        ]);

        return response()->json($chat, 201);
    }
}
