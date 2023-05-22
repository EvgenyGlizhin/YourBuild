<?php

namespace App\Http\Calculators\EstimateCalculator\FactoryEstimateCalculator;



use App\Http\Calculators\EstimateCalculator\InterfaceEstimateCalculator;

interface InterfaceCalculatorFactory
{
    public function createCalculator(string $category): InterfaceEstimateCalculator;
}

