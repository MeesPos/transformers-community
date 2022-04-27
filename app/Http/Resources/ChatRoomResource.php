<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ChatRoomResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'users' => [
                'self' => Auth::user(),
                'other' => $this->findObjectByOtherId(Auth::id())
            ]
        ];
    }

    public function findObjectByOtherId($id)
    {
        foreach ($this->users as $user) {
            if ($user->id != $id) {
                return $user;
            }
        }

        return false;
    }
}
