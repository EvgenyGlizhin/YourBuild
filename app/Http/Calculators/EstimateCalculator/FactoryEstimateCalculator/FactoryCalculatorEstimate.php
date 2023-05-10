<?php

namespace App\Http\Calculators\EstimateCalculator\FactoryEstimateCalculator;

use App\Http\Calculators\EstimateCalculator\AbstractEstimateCalculator;
use App\Http\Calculators\EstimateCalculator\LaminateEstimate;
use App\Http\Calculators\EstimateCalculator\PaintCeilingEstimate;
use App\Http\Calculators\EstimateCalculator\PaintWallEstimate;
use App\Http\Calculators\EstimateCalculator\TileFloorEstimate;
use App\Http\Calculators\EstimateCalculator\TileWallsEstimate;
use App\Http\Calculators\EstimateCalculator\WallPaperEstimate;

class FactoryCalculatorEstimate implements FactoryCalculatorInterface
{
    private $calculators = [
        'wallPaper' => WallPaperEstimate::class,
        'laminate' => LaminateEstimate::class,
        'paintCeiling' => PaintCeilingEstimate::class,
        'paintWall' => PaintWallEstimate::class,
        'tileFloor' => TileFloorEstimate::class,
        'tileWall' => TileWallsEstimate::class,
    ];

    public function createCalculator(string $category): AbstractEstimateCalculator
    {
        $calculatorClass = $this->calculators[$category];

        return new $calculatorClass();
    }
}
