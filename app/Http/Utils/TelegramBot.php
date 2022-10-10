<?php

namespace App\Http\Utils;

use Exception;

class TelegramBot
{
    private $telegram_path = 'API_BASEURL/botBOT_TOKEN/METHOD_NAME';
    protected $token = "";
    public function __construct($bot_token)
    {
        $this->token = $bot_token;
        $telegram_path = str_replace('BOT_TOKEN', $bot_token ,$this->telegram_path);
        $this->telegram_path = str_replace('API_BASEURL', config('services.telegram_bots.api_baseURL'), $telegram_path);
        return $this;
    }
    private function makeRequest($path, $type = 'get', $body = null)
    {
        $options = $body ? ['form_params' => $body] : [];
        $options = array_merge($options, ['timeout' => 60, 'headers' => ['Accept' => 'application/json']]);
        try {
            $request = new \GuzzleHttp\Client;
            if ($type == 'post') {
                $request = $request->request('POST', $path, $options);
            } else {
                $request = $request->request('GET', $path, $options);
            }
            $response = $request->getBody();
            return json_decode($response->getContents());
        } catch (\GuzzleHttp\Exception\RequestException $ex) {
            \Log::error('error');
            \Log::error((string) $ex->getResponse()->getBody());
            throw $ex;
        }
    }
    private function setMethod($method_name)
    {
        return str_replace('METHOD_NAME', $method_name, $this->telegram_path);
    }
    public function answerInlineQuery($queryId, array $results = [])
    {
        return $this->makeRequest($this->setMethod('answerInlineQuery'), 'post', [
            'inline_query_id' => $queryId,
            'results' => $results,
            'cache_time' => 5
        ], 'json');
    }
    public function answerCallbackQuery($callback_query_id, $text, $show_alert = false)
    {
        return $this->makeRequest($this->setMethod('answerCallbackQuery'), 'post', [
            'callback_query_id' => $callback_query_id,
            'text' => $text,
            'show_alert' => $show_alert,
            'cache_time' => 5
        ], 'json');
    }
    public function getMe()
    {
        return $this->makeRequest($this->setMethod('getMe'));
    }
    public function getUpdates()
    {
        return $this->makeRequest($this->setMethod('getUpdates'));
    }
    public function getWebhookInfo()
    {
        return $this->makeRequest($this->setMethod('getWebhookInfo'));
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
        return $this->makeRequest($this->setMethod('sendPhoto'), 'post', array_merge([
            'chat_id' => $chat_id,
            'photo' => $photo_url,
        ], $extra), 'json');
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
    public function setWebhook($url)
    {
        return $this->makeRequest($this->setMethod('setWebhook'), 'post', [
            'url' => $url,
            // 'drop_pending_updates' => true,
            // 'secret_token' => config('services.telegram_bots.secret_token')
        ], 'json');
    }
    public function pinChatMessage($chat_id, $message_id, $notification = true)
    {
        return $this->makeRequest($this->setMethod('pinChatMessage'), 'post', [
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'disable_notification' => ! $notification
        ]);
    }
}