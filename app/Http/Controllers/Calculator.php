<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Calculator
{

    public function calculate(int $length, int $weight, float $height, string $category) : string {

        $lengthWalls = ($length + $weight) * 2;
        $floorArea = $length * $weight;
        $wallsArea = ($length + $weight + $length + $weight) * $height;

        $bandWallPaperInRollWithImage = 3;
        $bandWallPaperInRollWithoutImage = 3.5;
        $areaOneBordLaminate = 0.22;
        $kgPaintOneSquareMeter = 0.185;

        if($category === 'wallPaper'){
            $rollsWallPaperSelection = $lengthWalls / $bandWallPaperInRollWithImage;
            $rollsWallPaperWithoutSelection = $lengthWalls / $bandWallPaperInRollWithoutImage;
            $finishCalculation = ('С подбором рисунка ' . mb_substr($rollsWallPaperSelection, 0, 4) . ', ' . 'Без подбора рисунка ' . mb_substr($rollsWallPaperWithoutSelection, 0, 4));
        }

        if($category === 'laminate'){
            $countLaminate = $floorArea / $areaOneBordLaminate;
            $stockLaminate = ($countLaminate / '100') * '10';
            $countLaminateWithStock = $countLaminate + $stockLaminate;
            $finishCalculation = ('Вам нужно ' . mb_substr($countLaminateWithStock, 0, 4) . ' планок ламината размером 1380мм на 159мм . С учётом запаса 10%');
        }

        if($category === 'paint'){
            $paintForCeiling = $floorArea * $kgPaintOneSquareMeter;
            $paintForWall = $wallsArea * '0.185';
            $finishCalculation = ('Для потолка на один слой нужно ' . mb_substr($paintForCeiling, 0, 4) . ' кг. краски. Для стен на один слой нужно ' . mb_substr($paintForWall, 0, 4) . 'кг. краски.');
        }

        if($category === 'tile'){
            $stockTileFloor = ($floorArea / 100) * 10;
            $tileForFloor = $floorArea + $stockTileFloor;
            $stockTileWalls = ($wallsArea / 100) * 10;
            $tileForWall = $wallsArea + $stockTileWalls;
            $finishCalculation = ('На пол вам нужно ' . mb_substr($tileForFloor, 0, 4) . ' м. кв. плитки. На стены нужно ' . mb_substr($tileForWall, 0, 4) . ' м. кв. плитки. Учтён запас в 10%');
        }

        return $finishCalculation;
    }
}
