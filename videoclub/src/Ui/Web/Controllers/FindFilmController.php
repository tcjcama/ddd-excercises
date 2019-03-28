<?php

namespace MyApp\Ui\Web\Controllers;

use MyApp\Application\Service\Film\FindFilmCommand;
use MyApp\Application\Service\Film\FindFilmService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class FindFilmController
{
    private $service;

    public function __construct(FindFilmService $service)
    {
        $this->service = $service;
    }

    public function __invoke(int $id): Response
    {
        $film = $this->service->execute(new FindFilmCommand($id));

        return JsonResponse::create([
            'id' => $film->getId()->value(),
            'title' => $film->getTitle()->value(),
        ]);
    }
}
