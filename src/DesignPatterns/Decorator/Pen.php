<?php

namespace App\DesignPatterns\Decorator;

use App\DesignPatterns\Decorator\WriterInterface;

class Pen implements WriterInterface
{

    public function write(string $message): string
    {
        return $message;
    }
}
