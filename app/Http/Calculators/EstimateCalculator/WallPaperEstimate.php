<?php

namespace App\Http\Calculators\EstimateCalculator;

class WallPaperEstimate extends AbstractEstimateCalculator
{
    public function getDollarPricePerSquireMeter(): float
    {
        return 2;
    }

    public function calculate(float $length, float $width, float $height) : float
    {
        $pricePerSquireMeter = $this->getDollarPricePerSquireMeter();
        $finishPrice = $this->calculateWallsArea($length, $width, $height) * $pricePerSquireMeter;
        return $finishPrice;
    }
}
