<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Utils\Telegram\DayaBot;
use Illuminate\Http\Request;

class TelegramHookController extends Controller
{
    public function handle(Request $request)
    {
        try {
            (new DayaBot(config('services.telegram_bots.dayaartz.token')))->processRequest($request);
        } catch (\Throwable $th) {
            \Log::error($th->getMessage());
            \Log::error($th->getTraceAsString());
        }
        return response()->json(['okay' => true]);
    }
}