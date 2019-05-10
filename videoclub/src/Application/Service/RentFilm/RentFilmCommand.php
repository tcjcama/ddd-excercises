<?php

namespace MyApp\Application\Service\RentFilm;

class RentFilmCommand
{
    private $memberId;
    private $filmId;

    public function __construct(int $memberId, int $filmId)
    {
        $this->memberId = $memberId;
        $this->filmId = $filmId;
    }

    public function memberId():int
    {
        return $this->memberId;
    }

    public function filmId():int
    {
        return $this->filmId;
    }
}
