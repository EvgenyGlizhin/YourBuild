<?php

namespace App\Http\Calculators;

use App\VO\RoomDimensionsVO;

class MaterialsCalculator
{
    private const BAND_WALL_PAPER_IN_ROLL_WITH_IMAGE = 3;
    private const BAND_WALL_PAPER_IN_ROLL_WITHOUT_IMAGE = 3.5;
    private const AREA_ONE_BORD_LAMINATE = 0.22;
    private const KG_PAINT_ONE_SQUARE_METER = 0.185;
    private const MATERIALS_RESERVE_PERCENT = 10;

    public function calculate(RoomDimensionsVO $dimensionsVO, string $category) : float
    {

        if($category === 'wallPaper'){
            $rollsWallPaperWithoutSelection = $dimensionsVO->getLengthWalls() / self::BAND_WALL_PAPER_IN_ROLL_WITHOUT_IMAGE;
            $finishCalculation = ceil($rollsWallPaperWithoutSelection);
        }
        if($category === 'wallPaperWithSelection'){
            $rollsWallPaperSelection = $dimensionsVO->getLengthWalls() / self::BAND_WALL_PAPER_IN_ROLL_WITH_IMAGE;
            $finishCalculation = ceil($rollsWallPaperSelection);
        }
        if($category === 'laminate'){
            $quantityOfLaminateWithoutReserve = $dimensionsVO->getFloorArea() / self::AREA_ONE_BORD_LAMINATE;
            $necessaryReserveOfLaminate = self::calculationNecessaryReserveToPerformTheWork($quantityOfLaminateWithoutReserve);
            $finishCalculation = ceil($quantityOfLaminateWithoutReserve + $necessaryReserveOfLaminate);
        }
        if($category === 'paintCeiling'){
            $paintForCeiling = $dimensionsVO->getFloorArea() * self::KG_PAINT_ONE_SQUARE_METER;
            $finishCalculation = ceil($paintForCeiling);
        }
        if($category === 'paintWall'){
            $paintForWall = $dimensionsVO->getWallsArea() * self::KG_PAINT_ONE_SQUARE_METER;
            $finishCalculation = ceil($paintForWall);
        }
        if($category === 'tileFloor'){
            $necessaryReserveTileFloor = self::calculationNecessaryReserveToPerformTheWork($dimensionsVO->getFloorArea());
            $finishCalculation = ceil($dimensionsVO->getFloorArea() + $necessaryReserveTileFloor);
        }
        if($category === 'tileWall'){
            $necessaryReserveTileWalls = self::calculationNecessaryReserveToPerformTheWork($dimensionsVO->getWallsArea());
            $finishCalculation = ceil($dimensionsVO->getWallsArea() + $necessaryReserveTileWalls);
        }
        return $finishCalculation;
    }

    private function calculationNecessaryReserveToPerformTheWork(float $minCount) : float
    {
        $reserve = ($minCount / 100) * self::MATERIALS_RESERVE_PERCENT;
        return $reserve;
    }
}

