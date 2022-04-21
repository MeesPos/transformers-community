<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ChatsController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard/Chat');
    }

    public function fetchMessages()
    {
        return Message::query()
            ->with('user')
            ->get();
    }

    public function sendMessage(Request $request)
    {
        $message = Auth::user()
            ->messages()
            ->create([
                'message' => $request->input('message')
            ]);

        return ['status' => 'Message sent!'];
    }
}
