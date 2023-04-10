<?php

namespace App\Http\Calculators;

class CalculatorMaterials
{
    const BAND_WALL_PAPER_IN_ROLL_WITH_IMAGE = 3;
    const BAND_WALL_PAPER_IN_ROLL_WITHOUT_IMAGE = 3.5;
    const AREA_ONE_BORD_LAMINATE = 0.22;
    const KG_PAINT_ONE_SQUARE_METER = 0.185;
    const MATERIALS_RESERVE_PERCENT = 10;

    public function calculateStockFromMinCount(float $minCount) : float
    {
        $stock = ($minCount / 100) * self::MATERIALS_RESERVE_PERCENT;
        return $stock;
    }

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
            $minCountLaminate = $floorArea / self::AREA_ONE_BORD_LAMINATE;
            $stockLaminate = self::calculateStockFromMinCount($minCountLaminate);
            $finishCalculation = ceil($minCountLaminate + $stockLaminate);
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
            $stockTileFloor = self::calculateStockFromMinCount($floorArea);
            $finishCalculation = ceil($floorArea + $stockTileFloor);
        }
        if($category === 'tileWall'){
            $stockTileWalls = self::calculateStockFromMinCount($wallsArea);
            $finishCalculation = ceil($wallsArea + $stockTileWalls);
        }
        return $finishCalculation;
    }
}
