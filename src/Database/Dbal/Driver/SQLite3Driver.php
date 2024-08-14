<?php

namespace App\Database\Dbal\Driver;

use App\Database\Dbal\Connection\ConnectionInterface;
use App\Database\Dbal\Connection\SQLiteConnection;
use App\Database\Dbal\Driver\DriverInterface;

class SQLite3Driver implements DriverInterface
{
    use DriverTrait;

    public function __construct(string $url)
    {
        $filename = substr($url, strlen('sqlite://'));

        return new SQLiteConnection($filename);
    }
}
