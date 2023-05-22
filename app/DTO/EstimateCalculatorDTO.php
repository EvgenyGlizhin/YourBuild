<?php

namespace App\DTO;

class EstimateCalculatorDTO
{
    public float $length;
    public float $width;
    public float $height;
    public string $category;
    public string $email;
    public float $resultCalculate;
    public bool $isApprovedEmailSaving;
}
