<?php

namespace App\Interfaces;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;

interface CrudInterface
{
    public function getAll();

    public function getOne($id);

    public function create(UserCreateRequest $request);

    public function update(UserUpdateRequest $request);

    public function delete($id);
}
