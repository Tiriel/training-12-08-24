<?php

namespace App\Database\Orm\Repository;

use App\Database\Orm\Model\Book;

class BookRepository extends Repository
{

    public function getModelName(): string
    {
        return Book::class;
    }
}
