<?php

namespace App\Http\Calculators\EstimateCalculator;

interface InterfaceEstimateCalculator
{
    public function getDollarPricePerSquireMeter(): float;
    public function calculate(float $length, float $width, float $height): float;
}
