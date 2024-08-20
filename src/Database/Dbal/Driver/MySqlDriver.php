<?php

namespace App\Database\Dbal\Driver;

use App\Database\Dbal\Connection\ConnectionInterface;
use App\Database\Dbal\Connection\Exception\ConnectionException;
use App\Database\Dbal\Connection\PDOConnection;
use App\Database\Dbal\Driver\DriverInterface;

/**
 * @property PDOConnection $connection
 */
class MySqlDriver extends AbstractPdoDriver
{
}
