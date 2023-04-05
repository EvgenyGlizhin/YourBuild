<?php

namespace App\Http\Controllers;

use App\Http\Calculators\CalculatorMaterials;
use App\Http\Requests\Calculator\CalculatorMaterialsRequest;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('calculatorMaterials');
    }

    public function calculate(CalculatorMaterialsRequest $request, CalculatorMaterials $calculator)
    {
        $length = $request->input('length');
        $width = $request->input('width');
        $height = $request->input('height');
        $category = $request->input('category');
        $resultCalculate = $calculator->calculate($length, $width, $height, $category);

        return response()->json(['category' => $category, 'resultCalculate' => $resultCalculate]);
    }
}
