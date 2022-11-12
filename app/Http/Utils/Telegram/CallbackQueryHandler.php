<?php

namespace App\Http\Utils\Telegram;

use Illuminate\Http\Request;

class CallbackQueryHandler implements HandlerContract
{
    public DayaBot $bot_instance;
    public function __construct(DayaBot $bot_instance)
    {
        $this->bot_instance = $bot_instance;
    }
    public function handle(Request $request)
    {
        
    }
}