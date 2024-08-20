<?php

namespace App\Database\Dbal\Driver;

use App\Database\Dbal\Connection\ConnectionInterface;
use App\Database\Dbal\Driver\DriverInterface;

class DriverFactory
{
    public static function connect(string $dsn, ?string $user = null, ?string $password = null): DriverInterface
    {
        if (str_starts_with($dsn, 'sqlite')) {
            return new SQLite3Driver($dsn);
        }

        $platform = substr($dsn, 0, strpos($dsn, '/'));
        if (!\in_array($platform, ['mysql', 'postgresql'])) {
            throw new \InvalidArgumentException("Authorized drivers must be one of MySQL, MariaDB, PostgreSQL, or SQLite3");
        }

        return 'postgresql' === $platform ? new PostgreSQLDriver($dsn) : new MySQLDriver($dsn);
    }
}
