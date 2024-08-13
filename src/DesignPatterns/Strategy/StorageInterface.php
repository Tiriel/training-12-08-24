<?php

namespace App\DesignPatterns\Strategy;

interface StorageInterface
{
    public function get(string $key): mixed;

    public function set(string $key, mixed $data): void;
}
