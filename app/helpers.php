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