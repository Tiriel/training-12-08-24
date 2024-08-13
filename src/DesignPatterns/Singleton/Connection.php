<?php

namespace App\DesignPatterns\Singleton;

use PDO;

class Connection
{
    protected \PDO $_pdo;

    protected static Connection $_instance;

    private function __construct(string $dsn, string $user, string $password)
    {
        $this->_pdo = new \PDO($dsn, $user, $password);
    }

    private function __clone(): void
    {
    }

    public static function get(?string $dsn = null, ?string $user = null, ?string $password = null): static
    {
        if (static::$_instance instanceof Connection) {
            return static::$_instance;
        }

        if (null === $dsn) {
            throw new \InvalidArgumentException();
        }

        return static::$_instance = new static($dsn, $user, $password);
    }
}
