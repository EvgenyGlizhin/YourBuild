<?php

namespace App\Http\Calculators\EstimateCalculator;

interface EstimateCalculatorInterface
{
    public function calculate(float $length, float $width, float $height): float;
}
