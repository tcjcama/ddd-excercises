<?php

namespace MyApp\Infrastructure\Di;

use Exception;
use Psr\Container\ContainerExceptionInterface;

class ContainerException extends Exception  implements ContainerExceptionInterface
{

}
