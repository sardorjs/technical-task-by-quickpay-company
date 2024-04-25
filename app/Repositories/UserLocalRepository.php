<?php

namespace App\Repositories;

use App\Models\User;

class UserLocalRepository implements UserRepositoryInterface
{
    /**
     * Найти пользователя по Id
     * @param int $id
     * @return User
     */
    public function find(int $id): User
    {
        return User::query()->where('id', '=', $id)->firstOrFail();
    }
}
