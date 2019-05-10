<?php

namespace MyApp\Domain\Model\Rental;

use MyApp\Domain\Model\Film\FilmId;
use MyApp\Domain\Model\Member\MemberId;

class Rental
{

    public function __construct(MemberId $memberId, FilmId $filmId)
    {
    }
}
