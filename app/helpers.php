<?php

use Illuminate\Support\Facades\Route;

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
        $value = cache()->rememberForever($cache_key, function() use($key) {
            $setting = \App\Models\Setting::select('value')->where('key', $key)->first();
            return $setting->value ?? '';
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

if (! function_exists('custom_route')) {
    /**
     * Safely returns path if route exists
     * @param string $route_name
     * @param array|null $params
     * @return string path or #
     */
    function custom_route($route_name, $params = []) {
        return Route::has($route_name) ? route($route_name, $params) : '#';
    }
}

if (! function_exists('get_menu_items')) {
    function get_menu_items($menu_name) {
        $menu = \Cache::rememberForever("site.menus.{$menu_name}", function () use($menu_name) {
            $menu = App\Models\Menu::where('name', $menu_name)->with('items')->first();
            if ($menu) {
                return $menu->items->toArray();
            }
            return [];
        });
        return $menu;
    }
}

if (! function_exists('calculate_payments')) {
    function calculate_payments($total) {
        $percentage = $total > 10_000_000 ? 0.6 : 0.5;
        $deposit = $total * $percentage;
        $checkout = $total - $deposit;
        return compact('deposit', 'checkout');
    }
}