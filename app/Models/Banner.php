<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'image',
        'link',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the full URL for the banner image
     * Database stores: banners/filename.jpg
     * This returns: /uploads/banners/filename.jpg (relative URL)
     */
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return null;
        }

        // If it's already a full URL (http/https), return as is
        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        }

        // Database stores: banners/filename.jpg
        // Return: /uploads/banners/filename.jpg
        return '/uploads/' . ltrim($this->image, '/');
    }
}
