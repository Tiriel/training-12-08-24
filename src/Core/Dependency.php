<?php

namespace App\Core;

#[\Attribute(\Attribute::TARGET_PARAMETER)]
class Dependency
{
    public function __construct(public mixed $value)
    {
    }
}
