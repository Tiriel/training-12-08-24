<?php

namespace App\User;

use App\Auth\Interface\AuthInterface;
use App\Trait\TimestampableTrait;

abstract class User implements AuthInterface
{
    use TimestampableTrait;

    public function __construct(protected string $name)
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): User
    {
        $this->name = $name;

        return $this;
    }

    abstract public function auth(string $login, string $password): bool;

    abstract public function __toString(): string;
}
