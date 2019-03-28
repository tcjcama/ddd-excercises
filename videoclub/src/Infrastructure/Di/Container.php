<?php

namespace MyApp\Infrastructure\Di;

use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    private $services = [];

    public function register($id, $value)
    {
        $this->services[$id] = $value;
    }

    public function get($id)
    {
        if (false === $this->has($id)) {
            throw new DependencyNotFoundException;
        }

        $definition = $this->services[$id];

        if (is_callable($definition)) {
            return $definition($this);
        }

        if (is_object($definition)) {
            return $definition;
        }

        throw new ContainerException();
    }

    public function has($id)
    {
        return array_key_exists($id, $this->services);
    }
}
