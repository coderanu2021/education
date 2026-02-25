<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the full URL for the gallery image
     * Database stores: gallery/filename.jpg
     * This returns: /uploads/gallery/filename.jpg (relative URL)
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

        // Database stores: gallery/filename.jpg
        // Return: /uploads/gallery/filename.jpg
        return '/uploads/' . ltrim($this->image, '/');
    }
}
