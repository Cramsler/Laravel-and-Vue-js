<?php

namespace App\Interfaces;

use App\Http\Requests\MessageCreateRequest;
use App\Http\Requests\MessageUpdateRequest;

interface MessageCrudInterface extends BaseCrudInterface
{
    public function create(MessageCreateRequest $request);

    public function update(MessageUpdateRequest $request, int $id);
}
