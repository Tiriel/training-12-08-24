<?php

abstract class User implements AuthInterface
{
    public function __construct(protected string $name)
    {
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
}
