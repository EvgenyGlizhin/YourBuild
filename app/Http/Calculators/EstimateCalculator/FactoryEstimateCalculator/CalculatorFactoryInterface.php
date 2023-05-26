<?php

namespace App\Http\Calculators\EstimateCalculator\FactoryEstimateCalculator;



use App\Http\Calculators\EstimateCalculator\EstimateCalculatorInterface;

interface CalculatorFactoryInterface
{
    public function createCalculator(string $category): EstimateCalculatorInterface;
}

