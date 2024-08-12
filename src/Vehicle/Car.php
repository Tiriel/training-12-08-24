<?php

namespace App\Vehicle;

class Car extends Vehicle
{
    public function __construct(
        int $wheels,
        string $brand,
        string $make,
        protected bool $hasRadio,
    ) {
        parent::__construct($wheels, $brand, $make);
    }
}
