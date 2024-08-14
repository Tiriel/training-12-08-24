<?php

namespace App\Database\Connection;

use App\Core\Dependency;

class Connection
{
    public array $db = [];

    public function __construct(#[Dependency('env:DATABASE_DSN')] string $dsn)
    {
        //$this->db = new \PDO($dsn);
    }

    // pour add(), update(), remove()
    public function execute(string $sql, object $model): bool
    {
        return match ($sql) {
            'insert' => $this->insert($model),
            'update' => $this->update($model),
            'delete' => $this->delete($model),
            default => false,
        };
    }

    // pour get(), list()
    public function prepare(string $table, ?int $id = null): mixed
    {
        if ($id) {
            return $this->db[$table][$id] ?? null;
        }

        return $this->db[$table];
    }

    public function insert(object $model): bool
    {
        if (\array_key_exists($model->getId(), $this->db[$model::class])) {
            return false;
        }

        $this->db[$model::class][$model->getId()] = $model;

        return true;
    }

    private function update(object $model): bool
    {
        if (!\array_key_exists($model->getId(), $this->db[$model::class])) {
            return false;
        }

        $this->db[$model::class][$model->getId()] = $model;

        return true;
    }

    private function delete(object $model): bool
    {
        if (!\array_key_exists($model->getId(), $this->db[$model::class])) {
            return false;
        }

        \array_splice($this->db[$model::class], $model->getId()+1, 1);

        return true;
    }
}
