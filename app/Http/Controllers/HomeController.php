<?php

namespace App\Http\Controllers;

use App\Telegram\TelegramBot;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('home');
    }
}
