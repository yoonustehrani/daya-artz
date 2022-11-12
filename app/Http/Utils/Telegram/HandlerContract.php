<?php

namespace App\Http\Utils\Telegram;

use Illuminate\Http\Request;

interface HandlerContract
{
    public function handle(Request $request);
}