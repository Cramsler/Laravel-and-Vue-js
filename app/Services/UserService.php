<?php

namespace App\Services;

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

    public function getOne()
    {
        // TODO: Implement getOne() method.
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}
