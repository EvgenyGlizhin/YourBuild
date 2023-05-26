<?php

namespace App\Service;

use App\DTO\SendEstimateMailDTO;
use App\Mail\EstimateMail;
use App\Models\NotificationEmail;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function sendEstimateEmail(SendEstimateMailDTO $sendEstimateMailDTO)
    {
        $estimateData = [
            'category' => $sendEstimateMailDTO->getCategory(),
            'length' => $sendEstimateMailDTO->getLength(),
            'width' => $sendEstimateMailDTO->getWidth(),
            'height' => $sendEstimateMailDTO->getHeight(),
            'resultCalculate' => $sendEstimateMailDTO->getResultCalculate()
        ];
        try {
            Mail::to($sendEstimateMailDTO->getEmail())->send(new EstimateMail($estimateData));

            if ($sendEstimateMailDTO->isApprovedEmailSaving() === true) {
                $dataForSaveEmail['email'] = $sendEstimateMailDTO->getEmail();
                $dataForSaveEmail['user_id'] = auth()->user()->id;
                NotificationEmail::firstOrCreate($dataForSaveEmail);
            }
            return 'Данные успешно отправлены!';
        } catch (\Exception) {
            return 'Ошибка отправки письма';
        }
    }
}
