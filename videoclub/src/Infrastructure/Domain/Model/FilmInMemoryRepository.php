<?php

namespace MyApp\Infrastructure\Domain\Model;

use MyApp\Domain\Model\Film;
use MyApp\Domain\Model\FilmId;
use MyApp\Domain\Model\FilmRepository;
use MyApp\Domain\Model\Title;

class FilmInMemoryRepository implements FilmRepository
{
    public function findById(FilmId $filmId): Film
    {
        return new Film(
            $filmId,
            Title::fromString('Skia 3 el regreso.')
        );
    }
}
