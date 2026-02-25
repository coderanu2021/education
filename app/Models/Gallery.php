<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return null;
        }

        // If it's already a full URL (http/https), return as is
        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        }

        // If it starts with 'gallery/', prepend 'uploads/'
        if (str_starts_with($this->image, 'gallery/')) {
            return asset('uploads/' . $this->image);
        }

        // If it already has 'uploads/', use as is
        if (str_starts_with($this->image, 'uploads/')) {
            return asset($this->image);
        }

        // Default: assume it's in uploads/gallery
        return asset('uploads/gallery/' . $this->image);
    }
}
