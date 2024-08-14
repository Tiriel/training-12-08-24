<?php

namespace App\Database\Dbal\Driver;

use App\Database\Dbal\Connection\ConnectionInterface;

trait DriverTrait
{
    protected ConnectionInterface $connection;

    public function getConnection(): ConnectionInterface
    {
        return $this->connection;
    }
}
