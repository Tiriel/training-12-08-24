<?php

namespace User;

class Customer extends User
{

    public function auth(string $login, string $password): bool
    {
        return true;
    }

    public function __toString(): string
    {
        return 'Customer informations are protected. Customer id: '. md5($this->name);
    }
}
