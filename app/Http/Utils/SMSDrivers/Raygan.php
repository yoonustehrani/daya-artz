<?php

namespace App\Http\Utils\SMSDrivers;

use App\Traits\GuzzleAsAService;
use GuzzleHttp\Client;

class Raygan implements SMSDriver
{
    use GuzzleAsAService;
    protected $baseURL;
    public $config = [];
    public $client;
    public $otp;

    public function __construct()
    {
        $this->baseURL = config('services.rayganSMS.url.base');
        $this->config = config('services.rayganSMS.auth');
        $this->otp = $this->baseURL . config('services.rayganSMS.url.otp');
        $this->client = new Client();
    }

    public function getBaseURL()
    {
        return $this->baseURL;
    }
    /**
     * @param string
     * @return \App\Http\Utils\SMSDrivers\Faraz
     */
    public function to($to)
    {
        $this->config['Mobile'] = $to;
        return $this;
    }
    // /**
    //  * @param string
    //  * @return \App\Http\Utils\SMSDrivers\Faraz
    //  */
    // public function from(string $from)
    // {
    //     $this->config['from'] = $from;
    //     return $this;
    // }
    public function message(string $text)
    {
        $this->config['Message'] = $text;
        return $this;
    }
    // public function sendMessage($from, $to, $message)
    // {
    //     return $this->from($from)->to($to)->message($message)->send();
    // }
    // public function sendPattern($from, $to, string $pattern, array $values)
    // {
    //     $this->config['pattern'] = $pattern;
    //     $this->config['pattern_values'] = $values;
    //     return $this->from($from)->to($to, true)->send('pattern');
    // }
    public function sendOTP()
    {
        if ($this->config['Mobile'] && $this->config['Message']) {
            $response = $this->postRequest($this->otp, ['form_params' => $this->config]);
            return $response;
            // if ($response['status']) {
            //     return $response['json_body'];
            // }
        }
        return $this->notOK();
    }
    // public function simpleMessageSend()
    // {
    //     $url = $this->getBaseURL() . 'messages';
    //     if ($this->config['to'] && $this->config['from'] && $this->config['text']) {
    //         $params = [
    //             'originator' => $this->config['from'],
    //             'recipients' => $this->config['to'],
    //             'message' => $this->config['text']
    //         ];
    //         $response = $this->postRequest($url, ['json' => $params]);
    //         if ($response['status']) {
    //             return $response['json_body'];
    //         }
    //     }
    //     return $this->notOK();
    // }
    public function notOK()
    {
        return ['okay' => false];
    }
    public function send($mode = 'default')
    {
        if (is_array($this->config)) {
            switch ($mode) {
                case 'otp':
                    return $this->sendOTP();
                    break;
            }
        }
        return $this->notOK();
    }
}