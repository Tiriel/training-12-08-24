<?php

namespace App\DesignPatterns\Decorator;

use App\DesignPatterns\Decorator\AbstractDecorator;

class ItalicDecorator extends AbstractDecorator
{

    public function write(string $message): string
    {
        return "<i>".$this->writer->write($message)."</i>";
    }
}
