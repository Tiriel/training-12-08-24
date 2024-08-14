<?php

namespace App\Core;

use Psr\Container\NotFoundExceptionInterface;

class ServiceNotFoundException extends \InvalidArgumentException implements NotFoundExceptionInterface
{
}
