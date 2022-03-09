<?php

namespace App\Http\Utils;

use App\Http\Utils\SMSDrivers\Faraz;
use App\Http\Utils\SMSDrivers\Raygan;

class SMSTool
{
    public $config = [];
    public $driver;
    public $drivers = [];

    public function __construct()
    {
        $default_drivers = [
            'faraz' => Faraz::class,
            // 'raygan' => Raygan::class
        ];
        foreach ($default_drivers as $name => $class) {
            $this->registerDriver($name, $class);
        }
    }

    public function getDriver($name)
    {
        return isset($this->drivers[$name]) ? app()->make($this->drivers[$name]) : null;
    }

    protected function registerDriver($name, $class_name)
    {
        if (! isset($this->drivers[$name])) {
            $this->drivers[$name] = $class_name;
        }
    }
}