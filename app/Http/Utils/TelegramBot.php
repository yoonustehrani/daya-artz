<?php

namespace App\Http\Utils;

class TelegramBot
{
    private $telegram_path = 'https://api.telegram.org/botBOT_TOKEN/METHOD_NAME';
    protected $token = "";
    public function __construct($bot_token)
    {
        $this->token = $bot_token;
        $this->telegram_path = str_replace('BOT_TOKEN', $bot_token ,$this->telegram_path);
        return $this;
    }
    private function makeRequest($path, $type = 'get', $body = null, $key = 'form_params')
    {
        $options = $body ? [$key => $body] : [];
        $options = array_merge($options, ['timeout' => 60, 'headers' => ['Accept' => 'application/json']]);
        $request = new \GuzzleHttp\Client;
        if ($type == 'post') {
            $request = $request->post($path, $options);
        } else {
            $request = $request->get($path, $options);
        }
        $response = $request->getBody();
        return json_decode($response->getContents());
    }
    private function setMethod($method_name)
    {
        return str_replace('METHOD_NAME', $method_name, $this->telegram_path);
    }
    public function getMe()
    {
        return $this->makeRequest($this->setMethod('getMe'));
    }
    public function getUpdates()
    {
        return $this->makeRequest($this->setMethod('getUpdates'));
    }
    public function sendMessage($chat_id, $text, $extra = [])
    {
        $path = $this->setMethod('sendMessage');
        $data = [
            'chat_id' => $chat_id,
            'text'    => $text,
        ];
        return $this->makeRequest($path, 'post', array_merge($data, $extra));
    }
    public function sendPhoto($chat_id, $photo_url, $extra = [])
    {
        $path = $this->setMethod('sendPhoto');
        $data = [
            'chat_id' => $chat_id,
            'photo' => $photo_url,
        ];
        return $this->makeRequest($path, 'post', array_merge($data, $extra));
    }
    public function sendDocument($chat_id, $document, $caption = "", $extra = [])
    {
        $path = $this->setMethod('sendDocument');
        $final_data = [
            [
                'name' => 'chat_id',
                'contents' => $chat_id
            ],
            [
                'name' => 'document',
                'contents' => \GuzzleHttp\Psr7\Utils::tryFopen($document, 'r')
            ],
            [
                'name' => 'caption',
                'contents' => $caption
            ]
        ];
        return $this->makeRequest($path, 'post', array_merge($final_data, $extra), 'multipart');
    }
    public function pinChatMessage($chat_id, $message_id, $notification = true)
    {
        $path = $this->setMethod('pinChatMessage');
        $data = [
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'disable_notification' => ! $notification
        ];
        return $this->makeRequest($path, 'post', $data);
    }
}