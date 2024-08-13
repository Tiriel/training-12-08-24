<?php

namespace App\DesignPatterns\Decorator;

interface WriterInterface
{
    public function write(string $message): string;
}
