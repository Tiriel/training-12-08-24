<?php

namespace App\Database\Model;

class Borrow
{
    protected ?int $id = null;
    protected User $user;
    protected Book $book;
    protected \DateTimeImmutable $borrowedAt;
    protected ?\DateTimeImmutable $returnedAt = null;

    public function __construct(int $id, \DateTimeImmutable $borrowedAt, Book $book, User $user)
    {
        $this->borrowedAt = $borrowedAt;
        $this->book = $book;
        $this->user = $user;
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): Borrow
    {
        $this->user = $user;
        return $this;
    }

    public function getBook(): Book
    {
        return $this->book;
    }

    public function setBook(Book $book): Borrow
    {
        $this->book = $book;
        return $this;
    }

    public function getBorrowedAt(): \DateTimeImmutable
    {
        return $this->borrowedAt;
    }

    public function setBorrowedAt(\DateTimeImmutable $borrowedAt): Borrow
    {
        $this->borrowedAt = $borrowedAt;
        return $this;
    }

    public function getReturnedAt(): ?\DateTimeImmutable
    {
        return $this->returnedAt;
    }

    public function setReturnedAt(?\DateTimeImmutable $returnedAt): Borrow
    {
        $this->returnedAt = $returnedAt;
        return $this;
    }
}
