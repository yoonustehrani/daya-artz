<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Utils\Telegram\DayaBot;
use Illuminate\Http\Request;

class TelegramHookController extends Controller
{
    public function handle(Request $request)
    {
        (new DayaBot(config('services.telegram_bots.dayaartz.token')))->processRequest($request);
        return response()->json(['okay' => true]);
    }
}