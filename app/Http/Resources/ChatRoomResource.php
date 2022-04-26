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
            'users' => $this->users
        ];
    }
}
