<?php

namespace App\DTO;

class SendEstimateMailDTO
{
    private float $length;
    private float $width;
    private float $height;
    private string $category;
    private string $email;
    private float $resultCalculate;
    private bool $isApprovedEmailSaving;

    public function __construct(float $length, float $width, float $height, string $category, string $email, float $resultCalculate, bool $isApprovedEmailSaving)
    {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
        $this->category = $category;
        $this->email = $email;
        $this->resultCalculate = $resultCalculate;
        $this->isApprovedEmailSaving = $isApprovedEmailSaving;
    }

    public function getLength(): float
    {
        return $this->length;
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function getHeight(): float
    {
        return $this->height;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getResultCalculate(): float
    {
        return $this->resultCalculate;
    }

    public function isApprovedEmailSaving(): bool
    {
        return $this->isApprovedEmailSaving;
    }
}
