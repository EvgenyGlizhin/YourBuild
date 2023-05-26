<?php

namespace App\Http\Calculators\EstimateCalculator;

class LaminateEstimate extends AbstractEstimateCalculator
{
    public function getDollarPricePerSquireMeter(): float
    {
        return 3;
    }

    public function calculate(float $length, float $width, float $height) : float
    {
        $pricePerSquireMeter = $this->getDollarPricePerSquireMeter();
        $finishPrice = $this->calculateFloorArea($length, $width) * $pricePerSquireMeter;
        return $finishPrice;
    }
}
