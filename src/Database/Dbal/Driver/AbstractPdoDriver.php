<?php

namespace App\Database\Dbal\Driver;

use App\Database\Dbal\Connection\ConnectionInterface;
use App\Database\Dbal\Connection\PDOConnection;
use App\Database\Dbal\Driver\DriverInterface;

abstract class AbstractPdoDriver implements DriverInterface
{
    use DriverTrait;

    private const KEYS = ['host', 'port', 'dbname', 'unix_socket', 'charset'];

    public function __construct(string $url)
    {
        $this->connection = new PDOConnection(static::createPdoDsn($url));
    }

    private static function createPdoDsn(string $url): string
    {
        $params = parse_url($url);
        $dsn = $params['scheme'].':' ?? '';

        foreach (self::KEYS as $key) {
            if (isset($params[$key])) {
                $dsn .= "{$key}={$params[$key]};";
            }
        }

        return $dsn;
    }
}
