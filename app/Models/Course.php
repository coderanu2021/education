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
}
