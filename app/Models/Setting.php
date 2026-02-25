<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'site_description',
        'logo',
        'footer_logo',
        'favicon',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'country',
        'postal_code',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'instagram_url',
        'youtube_url',
        'primary_color',
        'secondary_color',
        'accent_color',
        'footer_text',
        'copyright_text',
    ];

    protected static function booted()
    {
        static::saved(function () {
            Cache::forget('site_settings');
        });
    }

    public static function get()
    {
        return Cache::rememberForever('site_settings', function () {
            return self::first() ?? new self();
        });
    }
}
