<?php

namespace MyApp\Domain\Model;

interface FilmRepository
{
    public function findById(FilmId $filmId): Film;
}
