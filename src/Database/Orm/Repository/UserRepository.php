<?php

namespace App\Database\Orm\Repository;

use App\Database\Orm\Model\User;

class UserRepository extends Repository
{

    public function getModelName(): string
    {
        return User::class;
    }
}
