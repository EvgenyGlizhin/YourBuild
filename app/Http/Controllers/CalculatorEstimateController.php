<?php

namespace App\Http\Controllers;

use App\Http\Calculators\EstimateCalculator\ListOfCalculators;
use App\Http\Requests\Calculator\CalculatorEstimateRequest;
use App\Service\MailService;

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

    public function calculate(CalculatorEstimateRequest $request, MailService $service, ListOfCalculators $listOfCalculators)
    {
        $length = $request->getLength();
        $width = $request->getWidth();
        $height = $request->getHeight();
        $category = $request->getCategory();
        $email = $request->getEmail();
        $approveSaveEmail = $request->getApproveSaveEmail();


        $arrCategoryCalculators = $listOfCalculators->calculators();
        $calculatorSelectionCategory = $arrCategoryCalculators[$category];
        $resultCalculate = $calculatorSelectionCategory->calculate($length, $width, $height);

        $successfulSendMail = $service->sendEmail($category, $length,$width, $height, $email, $resultCalculate, $approveSaveEmail);

        return view('calculators.calculatorEstimate', compact('successfulSendMail'));
    }
}
