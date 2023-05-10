<?php

namespace App\Http\Calculators\EstimateCalculator\FactoryEstimateCalculator;


use App\Http\Calculators\EstimateCalculator\AbstractEstimateCalculator;

interface FactoryCalculatorInterface
{
    public function createCalculator(string $category): AbstractEstimateCalculator;
}
