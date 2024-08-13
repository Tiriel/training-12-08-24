<?php

namespace App\DesignPatterns\Decorator;

use App\DesignPatterns\Decorator\AbstractDecorator;

class SmallDecorator extends AbstractDecorator
{

    public function write(string $message): string
    {
        return "<small>".$this->writer->write($message)."</small>";
    }
}
