<?php

namespace App\Http\Controllers;

use App\Http\Calculators\EstimateCalculator\FactoryEstimateCalculator\InterfaceCalculatorFactory;
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

    public function calculate(CalculatorEstimateRequest $request, MailService $service, InterfaceCalculatorFactory $factory)
    {
        $length = $request->getLength();
        $width = $request->getWidth();
        $height = $request->getHeight();
        $category = $request->getCategory();
        $email = $request->getEmail();
        $isApprovedEmailSaving = $request->isApprovedEmailSaving();

        $calculator = $factory->createCalculator($category);
        $resultCalculate = $calculator->calculate($length, $width, $height);

        $successfulSendMail = $service->sendEstimateEmail($category, $length,$width, $height, $email, $resultCalculate, $isApprovedEmailSaving);

        return view('calculators.calculatorEstimate', compact('successfulSendMail'));
    }
}
