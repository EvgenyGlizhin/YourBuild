<?php

namespace App\DTO;

class TagAttributesDTO
{
    private string $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
    return $this->title;
    }
}
