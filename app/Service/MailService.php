<?php

namespace App\Service;

use App\Mail\EstimateMail;
use App\Models\EmailForSendingMessages;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function sendEstimateEmail(string $category, float $length, float $width, float $height, string $email, float $resultCalculate, bool $isApprovedEmailSaving)
    {
        $estimateData = [
            'category' => $category,
            'length' => $length,
            'width' => $width,
            'height' => $height,
            'resultCalculate' => $resultCalculate
        ];
        try {
            Mail::to($email)->send(new EstimateMail($estimateData));

            if ($isApprovedEmailSaving === true) {
                $dataForSaveEmail['email'] = $email;
                $dataForSaveEmail['user_id'] = auth()->user()->id;
                EmailForSendingMessages::firstOrCreate($dataForSaveEmail);
            }
            return 'Данные успешно отправлены!';
        } catch (\Exception) {
            return 'Ошибка отправки письма';
        }
    }
}
