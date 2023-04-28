<?php

namespace App\Http\Controllers;

use App\Http\Calculators\EstimateCalculator;
use App\Http\Requests\Calculator\CalculatorEstimateRequest;
use App\Models\Email;
use Illuminate\Support\Facades\Mail;
use App\Mail\EstimateMail;

class CalculatorEstimateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('calculators.calculatorEstimate');
    }

    public function calculate(CalculatorEstimateRequest $request, EstimateCalculator $calculator)
    {
        $length = $request->getLength();
        $width = $request->getWidth();
        $height = $request->getHeight();
        $category = $request->getCategory();
        $email = $request->getEmail();
        $approveSaveEmail = $request->getApproveSaveEmail();

        $resultCalculate = $calculator->calculate($length, $width, $height, $category);
        $estimateData = [
            'category' => $category,
            'length' => $length,
            'width' => $width,
            'height' => $height,
            'resultCalculate' => $resultCalculate
        ];
        Mail::to($email)->send(new EstimateMail($estimateData));

        if($approveSaveEmail === 'true'){
            $dataForSaveEmail['email'] = $email;
            $dataForSaveEmail['user_id'] = auth()->user()->id;
            Email::firstOrCreate($dataForSaveEmail);
        }

        $successfulMailOperation = 'Данные успешно отправлены!';
        return view('calculators.calculatorEstimate', compact('successfulMailOperation'));
    }
}
