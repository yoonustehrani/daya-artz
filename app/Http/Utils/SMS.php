<?php

namespace App\Http\Utils;

use GuzzleHttp\Client;

class SMS
{
    public $to;
    public $from;
    public $text;
    public $template;
    public $params;
    private $config;
    private $baseurl;
    public function __construct()
    {
        $this->config = config('services.rayganSMS.auth');
        $this->baseurl = config('services.rayganSMS.url.base');
        return $this;
    }
    public function from($line_number)
    {
        $this->from = $line_number;
        return $this;
    }
    public function to($phone_number)
    {
        $this->to = $phone_number;
        return $this;
    }
    public function text($text)
    {
        $this->text = $text;
        return $this;
    }
    public function template($template, $params)
    {
        $this->template = $template;
        $this->params = $params;
        return $this;
    }
    public function sendAuth(string $message)
    {
        if ($this->to && $message) {
            $config = array_merge($this->config, [
                'Mobile' => $this->to,
                'Message' => $message 
            ]);
            $url = $this->baseurl . config('services.rayganSMS.url.otp');
            $response_code = (int) $this->requestHttp($url, $config);
            if ($response_code > 2000) {
                return ['okay' => true];
            }
        }
    }
    // private function sendPattern($params)
    // {
    //     // return \GhasedakSMS::verify($this->to, 1, $this->template, $params);
    // }
    public function send()
    {
        
    }
    private function requestHttp($url, $params)
    {
        try {
            $response = (new Client())->request('POST', $url, [
                'form_params' => $params
            ]);
            if ($response->getStatusCode() === 200) { 
                return $response->getBody()->getContents();
            }
        } catch (\Exception $err) {
            throw $err;
        }
    }
}