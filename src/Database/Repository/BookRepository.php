<?php

namespace App\Database\Repository;

use App\Database\Model\Book;
use App\Database\Repository\Repository;

class BookRepository extends Repository
{

    public function getModelName(): string
    {
        return Book::class;
    }
}
