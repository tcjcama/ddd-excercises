<?php

// Autoload files
use MyApp\Application\Service\Film\FindFilmService;
use MyApp\Domain\Model\FilmRepository;
use MyApp\Infrastructure\Di\Container;
use MyApp\Infrastructure\Domain\Model\FilmInMemoryRepository;
use MyApp\Ui\Web\Controllers\FindFilmController;

require __DIR__ . '/vendor/autoload.php';

// Load .env
$dotenv = new \Symfony\Component\Dotenv\Dotenv();
$dotenv->load(__DIR__ . '/.env');

// Dependencies
$container = new Container();

$container->register(FilmRepository::class, function () {
    return new FilmInMemoryRepository();
});

$container->register(FindFilmService::class, function (Container $container) {
    return new FindFilmService($container->get(FilmRepository::class));
});

$container->register(FindFilmController::class, function (Container $container) {
    return new FindFilmController(
        $container->get(FindFilmService::class)
    );
});

// app
return new \MyApp\Infrastructure\App($container);
