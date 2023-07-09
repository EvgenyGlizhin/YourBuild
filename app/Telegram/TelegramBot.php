<?php

namespace App\Telegram;

use Illuminate\Support\Facades\Storage;
use Telegram\Bot\Api;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramBot
{
    const ABSOLUTE_PATH = "C:\\OSPanel\\domains\\yourbuild\\public\\storage\\uploads\\";

    public function sendMessage(int $chatId, string $message): void
    {
        Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => 'html'
        ]);
    }

    public function sendPhoto(int $chatId, string $photoName, string $caption): void
    {
        $photoPath = self::ABSOLUTE_PATH . $photoName;
        $photo = InputFile::create($photoPath, 'main_photo.jpg');

        Telegram::sendPhoto([
            'chat_id' => $chatId,
            'photo' => $photo, 'caption' => $caption,
        ]);
    }

    public function sendButtons(int $chatId, string $message, string $buttons): void
    {
        Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => 'html',
            'reply_markup' => $buttons
        ]);
    }
}
