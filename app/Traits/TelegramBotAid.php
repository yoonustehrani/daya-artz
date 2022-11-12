<?php

namespace App\Traits;

use App\Models\Order;
use App\Models\Service;
use App\Models\TelegramUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

trait TelegramBotAid {

    public TelegramUser $user;

    public function findOrCreateUser(Request $request, $current_state = false)
    {
        if (isset($this->user) && $this->user) return $this->user;

        $user = TelegramUser::find($this->chat_id);
        if (! $user) {
            \Log::alert('creating user');
            $user = new TelegramUser();
            $user->chat_id = $this->chat_id;
            $user->fullname = trim($request->input('message.from.first_name') . ' ' . $request->input('message.from.last_name'));
            $user->user_id = null;
            $user->details = [];
        }
        if ($current_state !== false) {
            $user->current_state = $current_state;
        }
        $user->save();
        return $user;
    }
    
    public function changeUserState($state)
    {
        if ($this->user) {
            $this->user->current_state = $state;
            $this->user->save();
        }
    }
    public function send_message_to_user($text, $details = [])
    {
        return $this->sendMessage($this->chat_id, $text, $details);
    }

    public function handleBotCommands($command_name, Request $request)
    {
        if (in_array("{$command_name}", array_keys($this->commands))) {
            $func = $this->commands[$command_name];
            $this->user = $this->findOrCreateUser($request, $func['state']);
            return $this->{$func['call']}($request);
        } else {
            $matches = null;
            if (preg_match('/^\/service\_([0-9]{1,})$/', $command_name, $matches)) {
                $service_id = (int) $matches[1];
                $service = Service::select(['title', 'id'])->find($service_id);
                $this->user = $this->findOrCreateUser($request);
                return $this->addOrderItem($service);
            }
        }
        return $this->send_message_to_user('unknown command');
    }
}