<?php

namespace App\Database\Repository;

use App\Database\Connection\Connection;

abstract class Repository
{
    protected string $modelName;

    public function __construct(protected readonly Connection $connection)
    {
    }
}
