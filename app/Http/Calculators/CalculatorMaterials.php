<?php

namespace App\Http\Calculators;

class CalculatorMaterials
{
    const bandWallPaperInRollWithImage = 3;
    const bandWallPaperInRollWithoutImage = 3.5;
    const areaOneBordLaminate = 0.22;
    const kgPaintOneSquareMeter = 0.185;

    public function calculate(float $length, float $width, float $height, string $category) : float
    {
        $lengthWalls = ($length + $width) * 2;
        $floorArea = $length * $width;
        $wallsArea = $lengthWalls * $height;

        if($category === 'wallPaper'){
            $rollsWallPaperWithoutSelection = $lengthWalls / self::bandWallPaperInRollWithoutImage;
            $finishCalculation = ceil($rollsWallPaperWithoutSelection);
        }
        if($category === 'wallPaperWithSelection'){
            $rollsWallPaperSelection = $lengthWalls / self::bandWallPaperInRollWithImage;
            $finishCalculation = ceil($rollsWallPaperSelection);
        }
        if($category === 'laminate'){
            $countLaminate = $floorArea / self::areaOneBordLaminate;
            $stockLaminate = ($countLaminate / 100) * 10;
            $countLaminateWithStock = $countLaminate + $stockLaminate;
            $finishCalculation = ceil($countLaminateWithStock);
        }
        if($category === 'paintCeiling'){
            $paintForCeiling = $floorArea * self::kgPaintOneSquareMeter;
            $finishCalculation = ceil($paintForCeiling);
        }
        if($category === 'paintWall'){
            $paintForWall = $wallsArea * self::kgPaintOneSquareMeter;
            $finishCalculation = ceil($paintForWall);
        }
        if($category === 'tileFloor'){
            $stockTileFloor = ($floorArea / 100) * 10;
            $tileForFloor = $floorArea + $stockTileFloor;
            $finishCalculation = ceil($tileForFloor);
        }
        if($category === 'tileWall'){
            $stockTileWalls = ($wallsArea / 100) * 10;
            $tileForWall = $wallsArea + $stockTileWalls;
            $finishCalculation = ceil($tileForWall);
        }
        return $finishCalculation;
    }
}
