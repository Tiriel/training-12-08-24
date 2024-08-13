<?php

namespace App\DesignPatterns\Decorator;

use App\DesignPatterns\Factory\Connection;
use Psr\Log\LoggerInterface;

class TraceableConnection extends Connection
{
    public function __construct(
        protected readonly Connection $connection,
        protected readonly LoggerInterface $logger,
    ) {
    }

    public function list(string $table, int $limit, int $offset): iterable
    {
        $this->logger
            ->info(sprintf(
                "Requesting object list from table %s with limit %sdand offset %d",
                $table,
                $limit,
                $offset
            ));

        return $this->connection->list($table, $limit, $offset);
    }
}
