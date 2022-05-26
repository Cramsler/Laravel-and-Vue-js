<?php

namespace App\Http\Resources;

use Database\Seeders\ChatUserSeeder;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id'       => $this->id,
            'name'     => $this->full_name,
            'email'    => $this->email,
            'phone'    => $this->phone,
            'birthday' => $this->birthday,
            'chats'    => ChatResource::collection($this->chats)
        ];
    }
}
