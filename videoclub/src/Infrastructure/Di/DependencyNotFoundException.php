<?php

namespace MyApp\Infrastructure\Di;

use Exception;
use Psr\Container\NotFoundExceptionInterface;

class DependencyNotFoundException extends Exception implements NotFoundExceptionInterface
{

}
