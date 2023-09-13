<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function getChat($user_id)
    {
        $userReceipt = User::where('id', $user_id)->get();
        $messages = Message::where('user_id', auth()->user()->id)
            ->where('recipient_id', $user_id)
            ->orWhere('user_id', $user_id)
            ->where('recipient_id', auth()->user()->id)
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json(['messages' => $messages, 'user_received' => $userReceipt]);
    }

    public function sendMessage(Request $request)
    {
        $message = new Message;
        $message->user_id = auth()->user()->id;
        $message->recipient_id = $request->recipient_id;
        $message->message = $request->message;
        $message->save();

        return response()->json(['message' => $message]);
    }
}
