<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index()
    {
        $sourceLength = 5; //Заметить изходными размерами от пользователя
        $sourceWidth = 3.5;
        $sourceHeight = 2.7;

        $wallPaper = 1; //Заменить числа выбором материала из формы
        $laminate = 0;
        $paint = 0;
        $tile = 0;

        define('bandWallPaperInRollWithImage', 3);
        define('bandWallPaperInRollWithoutImage', 3.5);
        define('areaOneBordLaminate', 0.22);
        define('kgPaintOneSquareMeter', 0.180);

        $areaFloor = $sourceLength * $sourceWidth;
        $lengthWalls = ($sourceLength * 2) + ($sourceWidth * 2);
        $areaWalls = $lengthWalls * $sourceHeight;

        if ($wallPaper === 1) {
            $rollsWallPaperSelection = $lengthWalls / bandWallPaperInRollWithImage;
            $rollsWallPaperWithoutSelection = $lengthWalls / bandWallPaperInRollWithoutImage;
            $finishCalculation = ('С подбором рисунка ' . mb_substr($rollsWallPaperSelection, 0, 4) . ', ' . 'Без подбора рисунка ' . mb_substr($rollsWallPaperWithoutSelection, 0, 4));
        }
        elseif ($laminate === 1) {
            $countLaminate = $areaFloor / areaOneBordLaminate;
            $stockLaminate = ($countLaminate / '100') * '10';
            $countLaminateWithStock = $countLaminate + $stockLaminate;
            $finishCalculation = ('Вам нужно ' . mb_substr($countLaminateWithStock, 0, 4) . ' планок ламината размером 1380мм на 159мм . С учётом запаса 10%');
        }
        elseif ($paint === 1) {
            $paintForCeiling = $areaFloor * kgPaintOneSquareMeter;
            $paintForWall = $areaWalls * '0.175';
            $finishCalculation = ('Для потолка на один слой нужно ' . mb_substr($paintForCeiling, 0, 4) . ' кг. краски. Для стен на один слой нужно ' . mb_substr($paintForWall, 0, 4) . 'кг. краски.');
        }
        elseif ($tile === 1) {
            $stockTileFloor = ($areaFloor / 100) * 10;
            $tileForFloor = $areaFloor + $stockTileFloor;
            $stockTileWalls = ($areaWalls / 100) * 10;
            $tileForWall = $areaWalls + $stockTileWalls;
            $finishCalculation = ('На пол вам нужно ' . mb_substr($tileForFloor, 0, 4) . ' м. кв. плитки. На стены нужно ' . mb_substr($tileForWall, 0, 4) . ' м. кв. плитки. Учтён запас в 10%');
        }
        else{
            $finishCalculation = ('Данные не указаны!');
        }
        dd($finishCalculation);
    }
}
