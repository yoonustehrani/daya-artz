<?php

namespace App\Http\Utils\SMSDrivers;

interface SMSDriver
{
    public function getBaseURL();
    public function send();
}