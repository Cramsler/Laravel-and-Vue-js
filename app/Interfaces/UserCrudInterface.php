<?php

namespace App\Interfaces;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;

interface UserCrudInterface
{
    public function getAll();

    public function getOne(int $id);

    public function create(UserCreateRequest $request);

    public function update(UserUpdateRequest $request, int $id);

    public function delete(int $id);
}
