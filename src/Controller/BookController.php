<?php

namespace App\Controller;

use App\Database\Manager\BookManager;

class BookController
{
    public function __construct(protected readonly BookManager $manager)
    {
    }
}
