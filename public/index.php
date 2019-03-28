<?php

/** @var \MyApp\Infrastructure\App $app */
$app = require __DIR__ . '/../bootstrap.php';

use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

try {
    // Load routes from the yaml file
    $fileLocator = new FileLocator([__DIR__ . '/../routes']);
    $loader = new YamlFileLoader($fileLocator);
    $routes = $loader->load('routes.yaml');

    // Init RequestContext object
    $context = new RequestContext();
    $request = Request::createFromGlobals();
    $context->fromRequest($request);

    // Init UrlMatcher object
    $matcher = new UrlMatcher($routes, $context);

    // Find the current route
    $parameters = $matcher->match($context->getPathInfo());

    $controller = $app->get($parameters['_controller']);

    $excludeParameters = ['_controller', '_route'];
    $controllerParameters = array_filter(
        $parameters,
        function ($parameterName) use ($excludeParameters) {
            return false === in_array($parameterName, $excludeParameters, true);
        },
        ARRAY_FILTER_USE_KEY
    );

    /** @var \Symfony\Component\HttpFoundation\Response $response */
    $response = call_user_func_array($controller, $controllerParameters);

    $response->send();

} catch (ResourceNotFoundException $e) {
    dump($e);
}