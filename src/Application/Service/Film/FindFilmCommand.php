<?php

namespace MyApp\Application\Service\Film;

use MyApp\Application\Service\Command;

class FindFilmCommand implements Command
{
    private $filmId;

    public function __construct(string $filmId)
    {
        $this->filmId = $filmId;
    }

    public function filmId(): string
    {
        return $this->filmId;
    }
}
