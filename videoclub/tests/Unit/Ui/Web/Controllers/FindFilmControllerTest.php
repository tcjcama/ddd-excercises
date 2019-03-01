<?php

namespace MyApp\Tests\Unit\Ui\Web\Controllers;

use MyApp\Ui\Web\Controllers\FindFilmController;

class FindFilmControllerTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @tests
     */
    public function test_should_retrieve_film()
    {

        $filmId = '666';
        $controller = FindFilmController::getInstance();

        $film = $controller->__invoke($filmId);

        dump($film);
    }
}
