<?php

namespace App\Utils;

class Payment
{
    public $drivers;
    public function __construct()
    {
        $default_drivers = [
            'zarinpal' => '\App\Utils\Gateways\Zarinpal'
        ];
        $this->drivers = $default_drivers;
    }
    public function getDrivers()
    {
        return array_keys($this->drivers);
    }
    public function getDriver($driver = 'zarinpal')
    {
        if (isset($this->drivers[$driver])) {
            return app()->make($this->drivers[$driver]);
        }
        return null;
    }
}