<?php

namespace App\Controller;

use App\Database\Orm\Manager\BookManager;

class BookController
{
    public function __construct(protected readonly BookManager $manager)
    {
    }

    public function index(): void
    {
        $list = $this->manager->getList();
        var_dump($list);
    }

    public function borrowBook(int $id): void
    {
        echo "Borrow book id ".$id;
    }

    public function returnBook(int $id): void
    {
        echo "Return book id ".$id;
    }
}
