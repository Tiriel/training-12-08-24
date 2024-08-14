<?php

namespace App\Database\Dbal\Driver;

use App\Database\Dbal\Connection\ConnectionInterface;

interface DriverInterface
{
    public function getConnection(): ConnectionInterface;
}
