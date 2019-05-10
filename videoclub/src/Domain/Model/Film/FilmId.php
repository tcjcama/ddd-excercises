<?php

namespace MyApp\Domain\Model\Film;

class FilmId
{
    public static function fromInt(int $int)
    {
        return new self;
    }

    public function int():int
    {
        return 2;
    }
}
