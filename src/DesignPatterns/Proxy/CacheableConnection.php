<?php

namespace App\DesignPatterns\Proxy;

use App\DesignPatterns\Factory\Connection;
use App\DesignPatterns\Strategy\StorageInterface;

class CacheableConnection extends Connection
{
    public function __construct(
        protected StorageInterface $storage,
        protected Connection $connection,
    ) {
    }

    public function list(string $table, int $limit, int $offset): iterable
    {
        $key = sprintf("%s-%d-%d", $table, $limit, $offset);

        if (($result = $this->storage->get($key)) !== null) {
            return $result;
        }

        $result = $this->connection->list($table, $limit, $offset);
        $this->storage->set($key, $result);

        return $result;
    }
}
