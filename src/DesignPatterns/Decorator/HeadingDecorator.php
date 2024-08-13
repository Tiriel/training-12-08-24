<?php

namespace App\DesignPatterns\Decorator;

use App\DesignPatterns\Decorator\AbstractDecorator;

class HeadingDecorator extends AbstractDecorator
{

    public function write(string $message): string
    {
        return "<h1>".$this->writer->write($message)."</h1>";
    }
}
