<?php

namespace App\DesignPatterns\Decorator;

use App\DesignPatterns\Decorator\AbstractDecorator;

class BoldDecorator extends AbstractDecorator
{

    public function write(string $message): string
    {
        return "<b>".$this->writer->write($message)."</b>";
    }
}
