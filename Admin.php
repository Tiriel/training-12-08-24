<?php

class Admin extends Member
{
    protected static int $instances = 0;

    public function __construct(
        string $login,
        string $password,
        int $age,
        string $name,
        protected AdminLevel $level = AdminLevel::Admin,
    ) {
        parent::__construct($login, $password, $age, $name);
    }

    public function auth(string $login, string $password): bool
    {
        if (AdminLevel::SuperAdmin === $this->level) {
            return true;
        }

        return parent::auth($login, $password);
    }

    public function showLevel(): string
    {
        return $this->level->label();
    }
}
