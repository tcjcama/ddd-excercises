<?php

namespace MyApp\Application\Service\Film;

use MyApp\Application\Service\ApplicationService;
use MyApp\Domain\Model\FilmId;
use MyApp\Domain\Model\FilmRepository;

class FindFilmService implements ApplicationService
{
    private $filmRepository;

    public function __construct(FilmRepository $filmRepository)
    {
        $this->filmRepository = $filmRepository;
    }

    public function execute($command)
    {
        $filmId = FilmId::fromString($command->filmId());

        return $this->filmRepository->findById($filmId);

    }
}
