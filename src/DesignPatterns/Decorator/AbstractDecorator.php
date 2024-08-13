<?php

namespace App\DesignPatterns\Decorator;

abstract class AbstractDecorator implements WriterInterface
{
    public function __construct(
        protected readonly WriterInterface $writer,
    )
    {
    }
}
