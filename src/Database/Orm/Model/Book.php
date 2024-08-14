<?php

namespace App\Database\Orm\Model;

use App\Database\Orm\Enum\BookStatus;

class Book
{
    protected ?int $id = null;
    protected string $title;
    protected string $author;
    protected string $isbn;
    protected BookStatus $status;

    public function __construct(int $id, string $title, string $author, string $isbn)
    {
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->status = BookStatus::Available;
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Book
    {
        $this->title = $title;
        return $this;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): Book
    {
        $this->author = $author;
        return $this;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): Book
    {
        $this->isbn = $isbn;
        return $this;
    }

    public function borrowBook(): Book
    {
        $this->status = BookStatus::Borrowed;
        return $this;
    }

    public function returnBook(): Book
    {
        $this->status = BookStatus::Available;
        return $this;
    }
}
