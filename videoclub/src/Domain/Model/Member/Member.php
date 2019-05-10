<?php

namespace MyApp\Domain\Model\Member;

use MyApp\Domain\Model\Film\FilmId;
use MyApp\Domain\Model\Rental\Rental;

class Member
{
    private $id;

    /**
     * Member constructor.
     * @param $id
     */
    public function __construct(MemberId $id)
    {
        $this->id = $id;
    }

    public function rentFilm(FilmId $filmId):Rental
    {
        return new Rental($this->id, $filmId);
    }
}
