<?php

namespace App\DesignPatterns\Observer;

class Connection
{
    protected \PDO $_pdo;

    public function __construct(
        string $dsn,
        string $user,
        string $password,
        protected readonly EventDispatcher $dispatcher
    ) {
        try {
            $this->_pdo = new \PDO($dsn, $user, $password);
        } catch (\PDOException $e) {
            $this->dispatcher->notifyObservers('pdo_exception', $e);
        }
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
        $this->dispatcher->notifyObservers('new_sql_request', $sql);

        try {
            return $this->_pdo->query($sql)->fetchAll();
        } catch (\PDOException $e) {
            $this->dispatcher->notifyObservers('pdo_exception', $e);
        }
    }

}
