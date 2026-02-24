<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'address',
        'date_of_birth',
        'gender',
        'qualification',
        'course_id',
        'status',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
