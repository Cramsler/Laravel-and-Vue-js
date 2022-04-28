<?php

namespace App\Services;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Interfaces\CrudInterface;
use App\Models\User;

class UserService extends BaseService implements CrudInterface
{
    public function __construct(private User $user)
    {
    }

    public function getAll()
    {
        return $this->user->paginate(self::PAGINATE_COUNT);
    }

    public function getOne($id)
    {
        return $this->user->findOrFail($id);
    }

    public function create(UserCreateRequest $request)
    {
        // TODO: Implement create() method.
    }

    public function update(UserUpdateRequest $request)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
