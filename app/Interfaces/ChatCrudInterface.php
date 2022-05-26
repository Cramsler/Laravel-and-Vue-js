<?php

namespace App\Interfaces;



use App\Http\Requests\ChatCreateRequest;
use App\Http\Requests\ChatUpdateRequest;

interface ChatCrudInterface extends BaseCrudInterface
{
    public function create(ChatCreateRequest $request);

    public function update(ChatUpdateRequest $request, int $id);
}
