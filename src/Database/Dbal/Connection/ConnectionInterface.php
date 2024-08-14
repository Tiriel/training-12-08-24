<?php

namespace App\Database\Dbal\Connection;

interface ConnectionInterface
{
    public function prepare(string $prepareString);

    public function query(string $query, ?int $fetchMode = null, ...$args);

    public function exec(string $statement);

    public function lastInsertId(?string $name = null);

    public function beginTransaction();

    public function commit();

    public function rollBack();
}
