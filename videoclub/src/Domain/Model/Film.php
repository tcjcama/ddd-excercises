<?php

namespace MyApp\Domain\Model;

class Film
{
    private $id;
    private $title;

    public function __construct(FilmId $id, Title $title)
    {
        $this->id = $id;
        $this->title = $title;
    }

    public function getId(): FilmId
    {
        return $this->id;
    }

    public function getTitle(): Title
    {
        return $this->title;
    }
}
