<?php

namespace App\Database\Orm\Repository;

use App\Database\Orm\Model\Borrow;

class BorrowRepository extends Repository
{

    public function getModelName(): string
    {
        return Borrow::class;
    }
}
