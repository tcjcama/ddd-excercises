<?php

namespace MyApp\Domain\VO;

abstract class TextValue
{
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function fromString(string $filmId)
    {
        return new static($filmId);
    }

    public function value()
    {
        return $this->value;
    }
}
