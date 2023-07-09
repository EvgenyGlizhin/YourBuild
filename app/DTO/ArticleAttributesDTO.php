<?php

namespace App\DTO;

class ArticleAttributesDTO
{
    private string $title;
    private string $text;
    private string $imageUrl;
    private int $userId;

    public function __construct(string $title, string $text, string $imageUrl, int $userId)
    {
        $this->title = $title;
        $this->text = $text;
        $this->imageUrl = $imageUrl;
        $this->userId = $userId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setImageUrl(string $imageUrl): void
    {
        $this->imageUrl = $imageUrl;
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

}
