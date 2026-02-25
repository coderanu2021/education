<?php

use App\Models\Setting;

if (!function_exists('settings')) {
    function settings($key = null, $default = null)
    {
        $settings = Setting::get();
        
        if (is_null($key)) {
            return $settings;
        }
        
        return $settings->$key ?? $default;
    }
}
