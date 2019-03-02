<?php

namespace MyApp\Ui\Web\Controllers;

use MyApp\Application\Service\Film\FindFilmCommand;
use MyApp\Application\Service\Film\FindFilmService;
use MyApp\Infrastructure\Domain\Model\FilmInMemoryRepository;

class FindFilmController
{
    private $service;

    public function __construct(FindFilmService $service)
    {
        $this->service = $service;
    }

    public static function getInstance(): FindFilmController
    {
        return new self(new FindFilmService(
            new FilmInMemoryRepository()
        ));
    }

    public function __invoke(string $fimId)
    {
        return $this->service->execute(
            new FindFilmCommand($fimId)
        );
    }
}
