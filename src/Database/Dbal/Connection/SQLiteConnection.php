<?php

namespace App\Database\Dbal\Connection;

class SQLiteConnection extends \SQLite3 implements ConnectionInterface
{
    public function query(string $query, ?int $fetchMode = null, ...$args): false|\SQLite3Result
    {
        return parent::query($query);
    }

    public function lastInsertId(?string $name = null)
    {
        return parent::lastInsertRowID();
    }

    public function beginTransaction()
    {
        return $this->exec('BEGIN');
    }

    public function commit()
    {
        return $this->exec('COMMIT');
    }

    public function rollBack()
    {
        return $this->exec('ROLLBACK');
    }
}
