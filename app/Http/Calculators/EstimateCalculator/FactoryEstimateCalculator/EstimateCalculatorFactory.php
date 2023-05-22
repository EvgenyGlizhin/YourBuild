<?php

namespace App\Http\Calculators\EstimateCalculator\FactoryEstimateCalculator;

use App\Http\Calculators\EstimateCalculator\AbstractEstimateCalculator;
use App\Http\Calculators\EstimateCalculator\InterfaceEstimateCalculator;
use App\Http\Calculators\EstimateCalculator\LaminateEstimate;
use App\Http\Calculators\EstimateCalculator\PaintCeilingEstimate;
use App\Http\Calculators\EstimateCalculator\PaintWallEstimate;
use App\Http\Calculators\EstimateCalculator\TileFloorEstimate;
use App\Http\Calculators\EstimateCalculator\TileWallsEstimate;
use App\Http\Calculators\EstimateCalculator\WallPaperEstimate;
use Exception;

class EstimateCalculatorFactory implements InterfaceCalculatorFactory
{
    private const WALL_PAPER = 'wallPaper';
    private const LAMINATE = 'laminate';
    private const PAINT_CEILING = 'paintCeiling';
    private const PAINT_WALL = 'paintWall';
    private const TILE_FLOOR = 'tileFloor';
    private const TILE_WALL = 'tileWall';

    private $calculators = [
        self::WALL_PAPER => WallPaperEstimate::class,
        self::LAMINATE => LaminateEstimate::class,
        self::PAINT_CEILING => PaintCeilingEstimate::class,
        self::PAINT_WALL => PaintWallEstimate::class,
        self::TILE_FLOOR => TileFloorEstimate::class,
        self::TILE_WALL => TileWallsEstimate::class,
    ];

    public function createCalculator(string $category): InterfaceEstimateCalculator
    {
        if (!array_key_exists($category, $this->calculators)) {
            throw new Exception('Calculator not found for category ' . $category);
        }

        $calculatorClass = $this->calculators[$category];
        return new $calculatorClass();
    }
}
