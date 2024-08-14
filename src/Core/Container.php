<?php

namespace App\Core;

use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    private array $services = [];

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
                    $args[$key] = $attribute->newInstance()->value;
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
}
