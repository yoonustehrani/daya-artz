<?php

namespace App\Http\Utils;

class SMS
{
    public $to;
    public $from;
    public $text;
    public $template;
    public $params;
    public function __construct()
    {
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
    protected function sendSimple()
    {
        // return \GhasedakSMS::SendSimple($this->to,$this->text,$this->from);
    }
    protected function sendPattern($params)
    {
        // return \GhasedakSMS::verify($this->to, 1, $this->template, $params);
    }
    public function send()
    {
        // if ($this->to) {
        //     try {
        //         if ($this->from && $this->text) {
        //             return $this->sendSimple();
        //         } elseif ($this->template && $this->params) {
        //             return $this->sendPattern($this->params);
        //         }
        //         return null;
        //     }
        //     catch(\Ghasedak\Exceptions\ApiException $e){
        //         \Log::error('Ghasedak ApiException: ' . $e->errorMessage());
        //         throw $e->errorMessage();
        //     }
        //     catch(\Ghasedak\Exceptions\HttpException $e){
        //         \Log::error('Ghasedak HttpException: ' . $e->errorMessage());
        //         throw $e->errorMessage();
        //     }
        // }
    }
}