<?php

if (! function_exists('flash')) {
    function flash() {
        return app()->make('Zeus\Services\Flash');
    }
}

if (! function_exists('jalali_date_should_be_used')) {
    function jalali_date_should_be_used() {
        return auth('zeus')->user()->lang === 'fa';
    }
}