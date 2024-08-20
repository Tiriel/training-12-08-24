<?php

namespace App\Database\Dbal\Driver;

use App\Database\Dbal\Connection\ConnectionInterface;

interface DriverInterface
{
    public function getConnection(): ConnectionInterface;

    public function insert(string $table, array $keys, array $values): int;

    public function update(string $table, array $keys, array $values, array $where): int;

    public function delete(string $table, array $where): int;

    public function get(string $table, array $where = []): mixed;
}
