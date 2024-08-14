<?php

namespace App\Database\Repository;

use App\Database\Model\User;
use App\Database\Repository\Repository;

class UserRepository extends Repository
{

    public function getModelName(): string
    {
        return User::class;
    }
}
