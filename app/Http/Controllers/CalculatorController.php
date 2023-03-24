<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index(Request $request)
    {

        $length = $request->input('length');
        $wight = $request->input('wight');
        $height = $request->input('height');
        $category = $request->input('category');

        $calculator = new Calculator();
        echo ($calculator->calculate( $length, $wight, $height, $category));
    }
}
