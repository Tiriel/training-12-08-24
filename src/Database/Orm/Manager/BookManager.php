<?php

namespace App\Database\Orm\Manager;

use App\Database\Orm\Repository\BookRepository;
use App\Database\Orm\Repository\BorrowRepository;

class BookManager
{
    public function __construct(
        protected readonly BorrowRepository $borrowRepository,
        protected readonly BookRepository $bookRepository,
    )
    {
    }

    public function getList(): iterable
    {
        return $this->bookRepository->list();
    }
}
