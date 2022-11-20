<?php

use App\Http\Utils\SMSTool;
use App\Http\Utils\TelegramBot;
use App\Models\Offer;
use App\Models\Bill;
use App\Models\Page;
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
        return \Cache::rememberForever("site.menus.{$menu_name}", function () use($menu_name) {
            $menu = App\Models\Menu::where('name', $menu_name)->with('items')->first();
            if ($menu) {
                return $menu->items->toArray();
            }
            return [];
        });
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

if (! function_exists('with_value_added')) {
    function with_value_added($total)
    {
        $value_added = config('app.tax_value', 9);
        $tax = ($total / 100) * $value_added;
        return $total + $tax;
    }
}

if (! function_exists('calculate_off')) {
    /**
     * Calculating if the $offer can be applied based on total
     * Returning the amount of offer in IRT
     * @param integer $total Total amount of Invoice
     * @param \App\Models\Offer $offer Offer Object
     * @return integer
     */
    function calculate_off($total, Offer $offer) {
        if (
            ($offer->min_total && $total < $offer->min_total)
            ||
            ($offer->max_total && $total > $offer->max_total)
        ) return 0;
        // if offer can be added
        if ($offer->value_type === 'percentage') {
            $p = $offer->value < 100 ? $offer->value : 100;
            return ($total / 100) * $p;
        }
        return $offer->value;
    }
}

if (! function_exists('make_bills')) {
    /**
     * @param integer $total Total amount of bills
     * @param null|string $title Title of bills
     * @return array of \App\Models\Bill
     */
    function make_bills($total, $title = null) {
        $bills = [];
        $payments = calculate_payments($total);
        foreach ($payments as $type => $amount) {
            $bill = new Bill([
                'active' => $type === 'deposit',
                'amount' => $amount,
                'title' => __("userarea.bills.{$type}", ['item_title' => $title ?? __('Order')]),
                'code' => (string) generate_code(6),
            ]);
            $bill->paid_at = null;
            array_push($bills, $bill);
        }
        return $bills;
    }
}

if (! function_exists('get_seo_settings')) {
    function get_seo_settings($slug, $instance) {
        return \Cache::rememberForever("{$slug}.{$instance->id}.seo_settings", function () use($instance) {
            return $instance->seo_settings;
        });
    }
}

if (! function_exists('get_website_page')) {
    function get_website_page($slug) {
        $page = \Cache::rememberForever("website.pages.{$slug}", function () use($slug) {
            return Page::whereSlug($slug)->first();
        });
        abort_if(! $page, 404);
        return $page;
    }
}

if (! function_exists('sms_driver')) {
    /**
     * @return App\Http\Utils\SMSDrivers\Faraz
     */
    function sms_driver()
    {
        return (new SMSTool)->getDriver('faraz');
    }
}

if (! function_exists('telegram_notifier_bot')) {
    function telegram_notifier_bot() {
        return new TelegramBot(config('services.telegram_bots.notifier.token'));
    }
}

if (! function_exists('telegram_keyboard')) {
    function telegram_keyboard(array $keyboard, $resize = true) {
        return [
            'reply_markup' => [
                'keyboard' => $keyboard,
                'resize_keyboard' => $resize
            ]
        ];
    }
}

if (! function_exists('get_list_of_services')) {
    /**
     * @return Illuminate\Support\Collection
     */
    function get_list_of_services($query = null, $limit = 5, $select = ['id', 'title', 'group', 'subtitle', 'short_description']) {
        $dbquery = \App\Models\Service::select($select)->where('package', false);
        if ($query) {
            $dbquery->where('title', 'like', "%{$query}%")->orWhere('subtitle', 'like', "%{$query}%")->limit($limit);
        } else {
            $dbquery->where('main', true);
        }
        return $dbquery->get();
    }
}

if (! function_exists('set_telegram_webhook')) {
    function set_telegram_webhook($bot_token, $url) {
        $webhook_url = url()->to("api/{$url}");
        \Log::info('setting webhook to ' . $webhook_url);
        $bot = new TelegramBot($bot_token);
        $data = [];
        if (config('app.env') === 'prouction') {
            $data = [
                'ip_address' => config('app.ip'),
                'drop_pending_updates' => true
            ];
        }
        $bot->setWebhook($webhook_url, $data);
    }
}

if (! function_exists('make_http_multi_params')) {
    function make_http_multi_params($param_name, $params)
    {
        $query = '';
        for ($i=0; $i < count($params); $i++) { 
            $query .= $param_name . '[]=' . $params[$i];
            if ($i < (count($params) - 1)) {
                $query .= '&';
            }
        }
        return $query;
    }
}