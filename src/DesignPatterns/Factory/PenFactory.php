<?php

namespace App\DesignPatterns\Factory;

use App\DesignPatterns\Decorator\Pen;
use App\DesignPatterns\Decorator\WriterInterface;

class PenFactory
{
    public static function create(string|array $decorators): WriterInterface
    {
        if (\is_string($decorators)) {
            $decorators = [$decorators];
        }
        $decorators = \array_reverse($decorators);

        $writer = new Pen();

        foreach ($decorators as $name) {
            $class = "App\\DesignPatterns\\Decorator\\".ucfirst($name)."Decorator";
            $writer = new $class($writer);
        }

        return $writer;
    }
}
