<?php

namespace MyApp\Infrastructure;

use Psr\Container\ContainerInterface;

class App implements ContainerInterface
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function get($id)
    {
        return $this->container->get($id);
    }

    public function has($id)
    {
        return $this->container->has($id);
    }
}
