<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ChatRoomCollection extends ResourceCollection
{
    public $collects = ChatRoomResource::class;

    public static $wrap = null;

    protected function collectResource($resource)
    {
        $resource = parent::collectResource($resource);

        $this->collection = $this->collection->sortBy('created_at');

        return $resource;
    }
}
