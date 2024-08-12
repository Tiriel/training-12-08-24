<?php

class Vehicle
{
    use TimestampableTrait;

    public function __construct(
        protected int $wheels,
        protected string $brand,
        protected string $make,
    ) {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function start(int $times): bool
    {
        return true;
    }
}
