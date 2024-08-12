<?php

class Member extends User
{
    protected static int $instances = 0;

    public function __construct(
        protected string $login,
        protected string $password,
        protected int $age,
        string $name,
    ) {
        parent::__construct($name);
        static::$instances++;
    }

    public function __destruct()
    {
        static::$instances--;
    }

    public function auth(string $login, string $password): bool
    {
        if ($this->login !== $login || $this->password !== $password) {
            throw new AuthException($login);
        }

        return true;
    }

    public function __toString(): string
    {
        return 'Member : '.$this->name;
    }

    public static function count(): int
    {
        return static::$instances;
    }
}
