<?php

namespace App\DesignPatterns\Factory;

class Connection
{
    protected \PDO $_pdo;

    public function __construct(string $dsn, string $user, string $password)
    {
        $this->_pdo = new \PDO($dsn, $user, $password);
    }

    private function __clone(): void
    {
    }

    public function list(string $table, int $limit, int $offset): iterable
    {
        $sql = <<<EOD
SELECT * from $table
ORDER BY id DESC
LIMIT $limit OFFSET $offset;
EOD;

        return $this->_pdo->query($sql)->fetchAll();
    }
}
