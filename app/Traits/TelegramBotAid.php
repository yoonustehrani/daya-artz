<?php

namespace App\Traits;

use App\Models\TelegramUser;
use Illuminate\Http\Request;

trait TelegramBotAid {
    public function findOrCreateUser(Request $request, $current_state = false)
    {
        $user = TelegramUser::find($this->chat_id);
        if (! $user) {
            \Log::alert('creating user');
            $user = new TelegramUser();
            $user->chat_id = $this->chat_id;
            $user->fullname = trim($request->input('message.from.first_name') . ' ' . $request->input('message.from.last_name'));
        }
        $user->current_state = $current_state;
        $user->save();
        return $user;
    }
    public function send_message_to_user($text, $details = [])
    {
        return $this->sendMessage($this->chat_id, $text, $details);
    }
}