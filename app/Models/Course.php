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
     * Database stores: courses/filename.jpg
     * This returns: http://domain/uploads/courses/filename.jpg
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

        // Database stores: courses/filename.jpg
        // We need: uploads/courses/filename.jpg
        return url('uploads/' . ltrim($this->image, '/'));
    }
}
