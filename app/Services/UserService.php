<?php

namespace App\Services;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Interfaces\UserCrudInterface;
use App\Models\User;

class UserService extends BaseService implements UserCrudInterface
{
    public function getAll()
    {
        return User::paginate(self::PAGINATE_COUNT);
    }

    public function getOne(int $id)
    {
        return User::findOrFail($id);
    }

    public function create(UserCreateRequest $request)
    {
        return User::create($request->post());
    }

    public function update(UserUpdateRequest $request, int $id)
    {
        $user = $this->getOne($id);

        return $user->update($request->post());
    }

    public function delete(int $id)
    {
        return User::destroy($id);
    }
}
