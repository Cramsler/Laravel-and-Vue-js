<?php

namespace App\Interfaces;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;

interface UserCrudInterface extends BaseCrudInterface
{
    public function create(UserCreateRequest $request);

    public function update(UserUpdateRequest $request, int $id);

}
