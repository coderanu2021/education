<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'student_name',
        'course_id',
        'certificate_code',
        'certificate_note',
        'issue_date',
    ];

    protected $casts = [
        'issue_date' => 'date',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
