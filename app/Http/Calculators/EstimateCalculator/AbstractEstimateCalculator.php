<?php

namespace App\Http\Calculators\EstimateCalculator;

abstract class AbstractEstimateCalculator implements EstimateCalculatorInterface
{
    abstract public function getDollarPricePerSquireMeter(): float;

    abstract public function calculate(float $length, float $width, float $height): float;


    protected function calculateFloorArea(float $length, float $width): float
    {
        return $length * $width;
    }

    protected function calculateWallsArea(float $length, float $width, float $height): float
    {
        $lengthWalls = ($length + $width) * 2;
        return $lengthWalls * $height;
    }
}
