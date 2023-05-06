<?php

namespace App\Service;

use App\Mail\EstimateMail;
use App\Models\Email;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function sendEmail($category, $length, $width, $height, $email, $resultCalculate, $approveSaveEmail)
    {
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
        return 'Данные успешно отправлены!';
    }
}
