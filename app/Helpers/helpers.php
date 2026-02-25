<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Schema;

if (!function_exists('settings')) {
    function settings($key = null, $default = null)
    {
        try {
            // Check if settings table exists
            if (!Schema::hasTable('settings')) {
                return $default;
            }
            
            $settings = Setting::get();
            
            if (is_null($key)) {
                return $settings;
            }
            
            return $settings->$key ?? $default;
        } catch (\Exception $e) {
            return $default;
        }
    }
}
