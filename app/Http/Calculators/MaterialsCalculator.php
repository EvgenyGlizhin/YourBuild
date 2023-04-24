<?php

namespace App\Http\Calculators;

class MaterialsCalculator
{
    private const BAND_WALL_PAPER_IN_ROLL_WITH_IMAGE = 3;
    private const BAND_WALL_PAPER_IN_ROLL_WITHOUT_IMAGE = 3.5;
    private const AREA_ONE_BORD_LAMINATE = 0.22;
    private const KG_PAINT_ONE_SQUARE_METER = 0.185;
    private const MATERIALS_RESERVE_PERCENT = 10;

    public function calculate(float $length, float $width, float $height, string $category) : float
    {
        $lengthWalls = ($length + $width) * 2;
        $floorArea = $length * $width;
        $wallsArea = $lengthWalls * $height;

        if($category === 'wallPaper'){
            $rollsWallPaperWithoutSelection = $lengthWalls / self::BAND_WALL_PAPER_IN_ROLL_WITHOUT_IMAGE;
            $finishCalculation = ceil($rollsWallPaperWithoutSelection);
        }
        if($category === 'wallPaperWithSelection'){
            $rollsWallPaperSelection = $lengthWalls / self::BAND_WALL_PAPER_IN_ROLL_WITH_IMAGE;
            $finishCalculation = ceil($rollsWallPaperSelection);
        }
        if($category === 'laminate'){
            $quantityOfLaminateWithoutReserve = $floorArea / self::AREA_ONE_BORD_LAMINATE;
            $necessaryReserveOfLaminate = self::calculationNecessaryReserveToPerformTheWork($quantityOfLaminateWithoutReserve);
            $finishCalculation = ceil($quantityOfLaminateWithoutReserve + $necessaryReserveOfLaminate);
        }
        if($category === 'paintCeiling'){
            $paintForCeiling = $floorArea * self::KG_PAINT_ONE_SQUARE_METER;
            $finishCalculation = ceil($paintForCeiling);
        }
        if($category === 'paintWall'){
            $paintForWall = $wallsArea * self::KG_PAINT_ONE_SQUARE_METER;
            $finishCalculation = ceil($paintForWall);
        }
        if($category === 'tileFloor'){
            $necessaryReserveTileFloor = self::calculationNecessaryReserveToPerformTheWork($floorArea);
            $finishCalculation = ceil($floorArea + $necessaryReserveTileFloor);
        }
        if($category === 'tileWall'){
            $necessaryReserveTileWalls = self::calculationNecessaryReserveToPerformTheWork($wallsArea);
            $finishCalculation = ceil($wallsArea + $necessaryReserveTileWalls);
        }
        return $finishCalculation;
    }

    private function calculationNecessaryReserveToPerformTheWork(float $minCount) : float
    {
        $reserve = ($minCount / 100) * self::MATERIALS_RESERVE_PERCENT;
        return $reserve;
    }
}

