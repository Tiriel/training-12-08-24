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

    public function insert(string $table, array $keys, array $values): int
    {
        if (\count($keys) !== \count($values)) {
            throw new ConnectionException("Keys and Values counts do not match.");
        }

        $keyString = implode(', ', $keys);
        $valueString = implode(', ', \array_pad([], \count($keys), '?'));

        $sql = "INSERT INTO $table VALUES $valueString;";

        return $this->prepareAndExecute($sql, $values);
    }

    public function update(string $table, array $keys, array $values, array $where): int
    {
        if (\count($keys) !== \count($values)) {
            throw new ConnectionException("Keys and Values counts do not match.");
        }

        $sql = "UPDATE $table SET ";

        foreach ($keys as $index => $key) {
            $sql .= "$key = ?";
        }

        $sql = $this->addWhereClauses($sql, $where);

        return $this->prepareAndExecute($sql, $values);
    }

    public function delete(string $table, array $where): int
    {
        $sql = "DELETE FROM $table ";
        $sql = $this->addWhereClauses($sql, $where);

        return $this->prepareAndExecute($sql);
    }

    public function get(string $table, array $where = []): mixed
    {
        $sql = "SELECT * FROM $table ";
        $sql = $this->addWhereClauses($where);

        return $this->prepareAndExecute($sql);
    }

    protected function addWhereClauses(string $sql, array $wheres): string
    {
        if (!\is_array($wheres[0])) {
            $wheres = [$wheres];
        }

        foreach ($wheres as $condition) {
            if (3 > \count($condition) || 4 < \count($condition)) {
                throw new ConnectionException("Condition in where clause should be comprised of three our four parts.");
            }

            [$col, $op, $val, $andOr] = $condition + [3 => null];

            $sql .= "WHERE $col $op $val $andOr ";
        }

        return $sql;
    }

    protected function prepareAndExecute(string $sql, array $values = []): mixed
    {
        $this->connection->beginTransaction();

        try {
            /** @var \PDOStatement $stmt */
            $stmt = $this->connection->prepare($sql);

            $result = $stmt->execute($values);

            $this->connection->commit();
        } catch (\PDOException $e) {
            $this->connection->rollBack();

            throw new ConnectionException('PDOException : "'.$e->getMessage().'"');
        }

        return $result;
    }
}
