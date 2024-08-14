<?php

namespace App\Database\Repository;

use App\Database\Model\Borrow;
use App\Database\Repository\Repository;

class BorrowRepository extends Repository
{

    public function getModelName(): string
    {
        return Borrow::class;
    }
}
