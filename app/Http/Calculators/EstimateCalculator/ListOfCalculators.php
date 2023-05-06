<?php

namespace App\Http\Calculators\EstimateCalculator;

class ListOfCalculators
{
    public function calculators()
    {
        $calculators = [
                'wallPaper' => new WallPaperEstimate(),
                'laminate' => new LaminateEstimate(),
                'paintCeiling' => new PaintCeilingEstimate(),
                'paintWall' => new PaintWallEstimate(),
                'tileFloor' => new TileFloorEstimate(),
                'tileWall' => new TileWallsEstimate(),
            ];
        return $calculators;
    }
}
