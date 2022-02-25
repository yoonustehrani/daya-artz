<?php

if (! function_exists('generate_code')) {
    function generate_code($length = 6, $charType = 'number')
    {
        $code = "";
        if ($charType == 'string') {
            $code = \Str::random($length);
        } else {
            for ($i=0; $i < $length; $i++) { 
                $code .= (string) mt_rand(0,9);
            }
        }
        return $code;
    }
}

if (! function_exists('get_setting')) {
    function get_setting($key, $default = null)
    {
        $cache_key = "site-settings.{$key}";
        $value = \Cache::rememberForever($cache_key, function () use($key) {
            $setting = \App\Models\Setting::select('value')->where('key', $key)->first();
            return $setting ? $setting->value : null;
        });
        return $value ?: $default;
    }
}

if (! function_exists('setting_exists')) {
    function setting_exists($key)
    {
        return cache()->has("site-settings.{$key}");
    }
}