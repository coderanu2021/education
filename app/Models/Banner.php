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

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return null;
        }

        // If it's already a full URL (http/https), return as is
        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        }

        // Remove any leading slashes
        $path = ltrim($this->image, '/');

        // If it starts with 'banners/', prepend 'uploads/'
        if (str_starts_with($path, 'banners/')) {
            return url('uploads/' . $path);
        }

        // If it already has 'uploads/', use as is
        if (str_starts_with($path, 'uploads/')) {
            return url($path);
        }

        // Default: assume it's in uploads/banners
        return url('uploads/banners/' . $path);
    }
}
