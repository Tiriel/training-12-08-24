<?php

namespace App\DesignPatterns\Factory;

use App\DesignPatterns\Factory\Connection;

class ConnectionFactory
{

    protected static Connection $_instance;

    public static function get(?string $dsn = null, ?string $user = null, ?string $password = null): Connection
    {
        if (static::$_instance instanceof Connection) {
            return static::$_instance;
        }

        if (null === $dsn) {
            throw new \InvalidArgumentException();
        }

        return static::$_instance = new Connection($dsn, $user, $password);
    }
}
