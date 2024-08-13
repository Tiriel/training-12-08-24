<?php

namespace App\DesignPatterns\Adapter;

use App\DesignPatterns\Strategy\StorageInterface;

class RedisStorageAdapter implements StorageInterface
{
    public function __construct(
        protected readonly RedisStorage $redis,
    ) {
    }

    public function get(string $key): mixed
    {
        return $this->redis->find($key);
    }

    public function set(string $key, mixed $data): void
    {
        $this->redis->add($key, (string) $data);
    }
}
