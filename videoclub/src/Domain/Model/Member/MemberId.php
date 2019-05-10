<?php

namespace MyApp\Domain\Model\Member;

class MemberId
{
    private $int;

    /**
     * MemberId constructor.
     * @param $int
     */
    private function __construct($int)
    {
        $this->int = $int;
    }

    public static function fromInt(int $int)
    {
        return new self($int);
    }

    public function int():int
    {
        return $this->int;
    }
}
