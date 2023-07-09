<?php

namespace App\Exceptions;

use App\Telegram\TelegramBot;
use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Telegram\Bot\Laravel\Facades\Telegram;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    protected $telegramBot;
    public function __construct(Container $container, TelegramBot $telegramBot)
    {
        parent::__construct($container);
        $this->telegramBot = $telegramBot;
    }

    public function report(Throwable $e)
    {
        $errorMessage = [
          'description' => $e->getMessage(),
          'file' => $e->getFile(),
          'line' => $e->getLine()
        ];

        $this->telegramBot->sendMessage(824166043, (string)view('telegram.report', $errorMessage));
    }

    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
