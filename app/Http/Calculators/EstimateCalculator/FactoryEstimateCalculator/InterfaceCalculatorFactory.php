<?php

namespace App\Http\Calculators\EstimateCalculator\FactoryEstimateCalculator;


use App\Http\Calculators\EstimateCalculator\AbstractEstimateCalculator;

interface InterfaceCalculatorFactory
{
    public function createCalculator(string $category);
}
