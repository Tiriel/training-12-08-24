<?php

namespace App\Database\Manager;

use App\Database\Repository\BookRepository;
use App\Database\Repository\BorrowRepository;

class BookManager
{
    public function __construct(
        protected readonly BorrowRepository $borrowRepository,
        protected readonly BookRepository $bookRepository,
    )
    {
    }
}
