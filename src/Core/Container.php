<?php

namespace App\Core;

use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    private array $services = [];

    private array $env = [];

    public function __construct()
    {
        foreach ($_ENV as $var => $value) {
            $this->env['env:'.$var] = $value;
        }
    }

    /**
     * @inheritDoc
     */
    public function get(string $id)
    {
        if (!class_exists($id)) {
            throw new ServiceNotFoundException(sprintf('Service "%s" was not found in the container', $id));
        }

        if (\array_key_exists($id, $this->services)) {
            return $this->services[$id];
        }

        $refClass = new \ReflectionClass($id);
        $args = $refClass->getConstructor()?->getParameters() ?? [];

        foreach ($args as $key => $arg) {
            if (class_exists($type = $arg->getType()->getName())) {
                $args[$key] = $this->get($type);
            } else {
                $attributes = $arg->getAttributes(Dependency::class);
                foreach ($attributes as $attribute) {
                    $args[$key] = $this->getScalarValue($attribute->newInstance()->value);
                }
            }
        }

        return $this->services[$id] = new $id(...$args);
    }

    /**
     * @inheritDoc
     */
    public function has(string $id): bool
    {
        return \array_key_exists($id, $this->services) || \class_exists($id);
    }

    private function getScalarValue(string $value): ?string
    {
        if (str_starts_with($value, 'env:') && \array_key_exists($value, $this->env)) {
            return $this->env[$value];
        }

        return $value;
    }
}
