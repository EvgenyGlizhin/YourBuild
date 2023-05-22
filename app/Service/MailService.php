<?php

namespace App\Service;

use App\DTO\EstimateCalculatorDTO;
use App\Mail\EstimateMail;
use App\Models\NotificationEmail;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function sendEstimateEmail(EstimateCalculatorDTO $estimateCalculatorDTO)
    {
        $estimateData = [
            'category' => $estimateCalculatorDTO->category,
            'length' => $estimateCalculatorDTO->length,
            'width' => $estimateCalculatorDTO->width,
            'height' => $estimateCalculatorDTO->height,
            'resultCalculate' => $estimateCalculatorDTO->resultCalculate
        ];
        try {
            Mail::to($estimateCalculatorDTO->email)->send(new EstimateMail($estimateData));

            if ($estimateCalculatorDTO->isApprovedEmailSaving === true) {
                $dataForSaveEmail['email'] = $estimateCalculatorDTO->email;
                $dataForSaveEmail['user_id'] = auth()->user()->id;
                NotificationEmail::firstOrCreate($dataForSaveEmail);
            }
            return 'Данные успешно отправлены!';
        } catch (\Exception) {
            return 'Ошибка отправки письма';
        }
    }
}
