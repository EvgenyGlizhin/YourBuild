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

        $wallPaper = '1'; //Заменить числа выбором материала из формы
        $laminate = '0';
        $paint = '0';
        $tile = '0';

        $areaFloor = $sourceLength * $sourceWidth;
        $lengthWalls = ($sourceLength * 2) + ($sourceWidth * 2);
        $areaWalls = $lengthWalls * $sourceHeight;

        if ($wallPaper == '1') {
            $rollsWallPaperSelection = $lengthWalls / '3';
            $rollsWallPaperWithoutSelection = $lengthWalls / '3.5';
            $finishCalculation = ('С подбором рисунка ' . mb_substr($rollsWallPaperSelection, 0, 4) . ', ' . 'Без подбора рисунка ' . mb_substr($rollsWallPaperWithoutSelection, 0, 4));
        }
        if ($laminate == '1') {
            $countLaminate = $areaFloor / '0.22';
            $stockLaminate = ($countLaminate / '100') * '10';
            $countLaminateWithStock = $countLaminate + $stockLaminate;
            $finishCalculation = ('Вам нужно ' . mb_substr($countLaminateWithStock, 0, 4) . ' планок ламината размером 1380мм на 159мм . С учётом запаса 10%');
        }
        if ($paint == '1') {
            $paintForCeiling = $areaFloor * '0.175';
            $paintForWall = $areaWalls * '0.175';
            $finishCalculation = ('Для потолка на один слой нужно ' . mb_substr($paintForCeiling, 0, 4) . ' кг. краски. Для стен на один слой нужно ' . mb_substr($paintForWall, 0, 4) . 'кг. краски.');
        }
        if ($tile == '1') {
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
