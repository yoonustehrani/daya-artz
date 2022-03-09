<?php

namespace App\Http\Utils\SMSDrivers;

use App\Traits\GuzzleAsAService;
use GuzzleHttp\Client;

class Faraz implements SMSDriver
{
    use GuzzleAsAService;
    protected $baseURL;
    public $config = [];
    public $client;

    public function __construct()
    {
        $apiKey = config('services.farazSMS.apikey');
        $this->baseURL = config('services.farazSMS.base_url');
        $this->client = new Client([
            'headers' => [
                'Authorization' => "AccessKey {$apiKey}"
            ]
        ]);
    }

    public function getBaseURL()
    {
        return $this->baseURL;
    }
    /**
     * @param string|array
     * @return \App\Http\Utils\SMSDrivers\Faraz
     */
    public function to($to, $asText = false)
    {
        if (is_string($to) && $asText) {
            $this->config['to'] = $to;
            return $this;
        }
        $this->config['to'] = is_array($to) ? $to : [$to];
        return $this;
    }
    /**
     * @param string
     * @return \App\Http\Utils\SMSDrivers\Faraz
     */
    public function from(string $from)
    {
        $this->config['from'] = $from;
        return $this;
    }
    public function message(string $text)
    {
        $this->config['text'] = $text;
        return $this;
    }
    public function sendMessage($from, $to, $message)
    {
        return $this->from($from)->to($to)->message($message)->send();
    }
    public function sendPattern($from, $to, string $pattern, array $values)
    {
        $this->config['pattern'] = $pattern;
        $this->config['pattern_values'] = $values;
        return $this->from($from)->to($to, true)->send('pattern');
    }
    public function sendPatternMessage()
    {
        $url = $this->getBaseURL() . 'messages/patterns/send';
        if ($this->config['to'] && $this->config['from'] && $this->config['pattern']) {
            $params = [
                'pattern_code' => $this->config['pattern'],
                'originator' => $this->config['from'],
                'recipient' => $this->config['to'],
                'values' => $this->config['pattern_values']
            ];
            $response = $this->postRequest($url, ['json' => $params]);
            if ($response['status'] === 200) {
                return $response['json_body'];
            }
        }
        return $this->notOK();
    }
    public function simpleMessageSend()
    {
        $url = $this->getBaseURL() . 'messages';
        if ($this->config['to'] && $this->config['from'] && $this->config['text']) {
            $params = [
                'originator' => $this->config['from'],
                'recipients' => $this->config['to'],
                'message' => $this->config['text']
            ];
            $response = $this->postRequest($url, ['json' => $params]);
            if ($response['status'] === 200) {
                return $response['json_body'];
            }
        }
        return $this->notOK();
    }
    public function notOK()
    {
        return ['okay' => false];
    }
    public function send($mode = 'default')
    {
        if (is_array($this->config)) {
            switch ($mode) {
                case 'pattern':
                    return $this->sendPatternMessage();
                    break;
                default:
                    return $this->simpleMessageSend();
                    break;
            }
        }
        return $this->notOK();
    }
}