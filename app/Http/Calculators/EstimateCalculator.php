<?php

namespace App\Http\Calculators;

class EstimateCalculator
{
    private const DOLLAR_PRICE_PER_SQUIRE_METER_PAINT = 2;
    private const DOLLAR_PRICE_PER_SQUIRE_METER_WALL_PAPER = 2;
    private const DOLLAR_PRICE_PER_SQUIRE_METER_LAMINATE = 3;
    private const DOLLAR_PRICE_PER_SQUIRE_METER_TILE = 8;

    public function calculate(float $length, float $width, float $height, string $category ) : float
    {
        $lengthWalls = ($length + $width) * 2;
        $floorArea = $length * $width;
        $wallsArea = $lengthWalls * $height;

        switch($category){
            case 'wallPaper':
                $finishCalculation = $wallsArea * self::DOLLAR_PRICE_PER_SQUIRE_METER_WALL_PAPER;
                break;
            case 'laminate':
                $finishCalculation = $floorArea * self::DOLLAR_PRICE_PER_SQUIRE_METER_LAMINATE;
                break;
            case 'paintCeiling':
                $finishCalculation = $floorArea * self::DOLLAR_PRICE_PER_SQUIRE_METER_PAINT;
                break;
            case 'paintWall':
                $finishCalculation = $wallsArea * self::DOLLAR_PRICE_PER_SQUIRE_METER_PAINT;
                break;
            case 'tileFloor':
                $finishCalculation = $floorArea * self::DOLLAR_PRICE_PER_SQUIRE_METER_TILE;
                break;
            case 'tileWall':
                $finishCalculation = $wallsArea * self::DOLLAR_PRICE_PER_SQUIRE_METER_TILE;
                break;
        }
        return $finishCalculation;
    }
}

