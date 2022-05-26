<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'user'       => (new UserResource($this->user)),
            'chat'       => (new ChatResource($this->chat)),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}