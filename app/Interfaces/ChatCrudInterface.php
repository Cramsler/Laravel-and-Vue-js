<?php

namespace App\Interfaces;



use App\Http\Requests\ChatCreateRequest;
use App\Http\Requests\ChatUpdateRequest;

interface ChatCrudInterface
{
    public function getAll();

    public function getOne(int $id);

    public function create(ChatCreateRequest $request);

    public function update(ChatUpdateRequest $request, int $id);

    public function delete(int $id);
}
