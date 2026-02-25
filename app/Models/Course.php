<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'summary',
        'description',
        'price',
        'image',
        'duration',
        'level',
        'features',
    ];

    protected $casts = [
        'features' => 'array',
    ];

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    /**
     * Get the full URL for the course image
     */
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return null;
        }

        // If it's already a full URL, return as is
        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        }

        $path = ltrim($this->image, '/');

        // If it starts with 'courses/', prepend 'uploads/'
        if (str_starts_with($path, 'courses/')) {
            return url('uploads/' . $path);
        }

        // If it already has 'uploads/', use as is
        if (str_starts_with($path, 'uploads/')) {
            return url($path);
        }

        // Default: assume it's in uploads/courses
        return url('uploads/courses/' . $path);
    }
}
