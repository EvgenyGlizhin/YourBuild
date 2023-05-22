<?php

namespace App\Http\Controllers;

use App\DTO\EstimateCalculatorDTO;
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

    public function calculate(CalculatorEstimateRequest $request, MailService $service, InterfaceCalculatorFactory $factory, EstimateCalculatorDTO $estimateCalculatorDTO)
    {
        $estimateCalculatorDTO->length = $request->getLength();
        $estimateCalculatorDTO->width = $request->getWidth();
        $estimateCalculatorDTO->height = $request->getHeight();
        $estimateCalculatorDTO->category = $request->getCategory();
        $estimateCalculatorDTO->email = $request->getEmail();
        $estimateCalculatorDTO->isApprovedEmailSaving = $request->isApprovedEmailSaving();

        $calculator = $factory->createCalculator($estimateCalculatorDTO->category);
        $resultCalculate = $calculator->calculate($estimateCalculatorDTO->length, $estimateCalculatorDTO->width, $estimateCalculatorDTO->height);

        $estimateCalculatorDTO->resultCalculate = $resultCalculate;
        $successfulSendMail = $service->sendEstimateEmail($estimateCalculatorDTO);

        return view('calculators.calculatorEstimate', compact('successfulSendMail'));
    }
}
