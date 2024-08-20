<?php

namespace App\Database\Orm\Repository;

use App\Database\Dbal\Driver\DriverInterface;

abstract class Repository
{
    protected string $modelName;

    public function __construct(protected readonly DriverInterface $driver)
    {
    }

    public function add(object $model): bool
    {
        return $this->driver;
    }

    public function remove(object $model): bool
    {
        return $this->connection->execute('delete', $model);
    }

    public function update(object $model): bool
    {
        return $this->connection->execute('update', $model);
    }

    public function get(int $id): ?object
    {
        return $this->connection->prepare($this->getModelName(), $id);
    }

    public function list(): iterable
    {
        return $this->connection->prepare($this->getModelName());
    }

    abstract public function getModelName(): string;
}
