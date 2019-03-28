<?php

namespace MyApp\Tests\Unit\Application\Service\Film;

use MyApp\Application\Service\Film\FindFilmCommand;
use MyApp\Application\Service\Film\FindFilmService;
use MyApp\Domain\Model\Film;
use MyApp\Tests\TestCase;

class FindFilmServiceTest extends TestCase
{
    /**
     * @tests
     */
    public function test_should_retrieve_film()
    {
        $filmId = '666';

        $film = $this->service()->execute(new FindFilmCommand($filmId));

        $this->assertInstanceOf(Film::class, $film);
    }

    public function service(): FindFilmService
    {
        return $this->app()->get(FindFilmService::class);
    }
}
