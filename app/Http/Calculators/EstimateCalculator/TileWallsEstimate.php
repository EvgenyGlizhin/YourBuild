<?php

namespace App\Http\Calculators\EstimateCalculator;

class TileWallsEstimate extends AbstractEstimateCalculator
{
    public function getDollarPricePerSquireMeter(): float
    {
        return 8;
    }

    public function calculate(float $length, float $width, float $height) : float
    {
        $pricePerSquireMeter = $this->getDollarPricePerSquireMeter();
        $finishPrice = $this->calculateWallsArea($length, $width, $height) * $pricePerSquireMeter;
        return $finishPrice;
    }
}
