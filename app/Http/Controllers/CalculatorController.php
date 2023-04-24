<?php

namespace App\Http\Controllers;

use App\Http\Calculators\MaterialsCalculator;
use App\Http\Requests\Calculator\CalculatorMaterialsRequest;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('calculatorMaterials');
    }

    public function calculate(CalculatorMaterialsRequest $request, MaterialsCalculator $calculator)
    {
        $length = $request->getLength();
        $width = $request->getWidth();
        $height = $request->getHeight();
        $category = $request->getCategory();
        $resultCalculate = $calculator->calculate($length, $width, $height, $category);

        return response()->json(['category' => $category, 'resultCalculate' => $resultCalculate]);
    }
}
