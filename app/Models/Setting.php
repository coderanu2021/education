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

    /**
     * Get the full URL for logo
     * Database stores: settings/filename.jpg
     * This returns: /uploads/settings/filename.jpg (relative URL)
     */
    public function getLogoUrlAttribute()
    {
        return $this->getImageUrl($this->logo);
    }

    /**
     * Get the full URL for footer logo
     */
    public function getFooterLogoUrlAttribute()
    {
        return $this->getImageUrl($this->footer_logo);
    }

    /**
     * Get the full URL for favicon
     */
    public function getFaviconUrlAttribute()
    {
        return $this->getImageUrl($this->favicon);
    }

    /**
     * Helper method to generate image URLs
     */
    private function getImageUrl($image)
    {
        if (!$image) {
            return null;
        }

        // If it's already a full URL, return as is
        if (filter_var($image, FILTER_VALIDATE_URL)) {
            return $image;
        }

        // Database stores: settings/filename.jpg
        // Return: /uploads/settings/filename.jpg
        return '/uploads/' . ltrim($image, '/');
    }
}
