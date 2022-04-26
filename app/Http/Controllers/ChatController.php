<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use App\Models\ChatRoomUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\NewChatMessage;

class ChatController extends Controller
{
    public function rooms(Request $request): \Illuminate\Database\Eloquent\Collection
    {
        return Auth::user()
            ->rooms()
            ->get();
    }

    public function messages(Request $request, $roomId): \Illuminate\Database\Eloquent\Collection|array
    {
        return ChatMessage::query()
            ->where('chat_room_id', $roomId)
            ->with('user')
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function newMessage(Request $request, $roomId): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder
    {
        $newMessage = ChatMessage::query()
            ->create([
                'user_id' => Auth::id(),
                'chat_room_id' => $roomId,
                'message' => $request->get('message')
            ]);

        broadcast(new NewChatMessage($newMessage))->toOthers();

        return $newMessage;
    }

    public function createRoom($userId): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder
    {
        $room = ChatRoom::query()
            ->create();

        ChatRoomUser::query()
            ->create([
                'user_id' => $userId,
                'room_id' => $room->getKey()
            ])
            ->create([
                'user_id' => Auth::id(),
                'room_id' => $room->getKey()
            ]);

        return $room;
    }
}
