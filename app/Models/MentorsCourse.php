<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Mentor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MentorsCourse extends Model
{
    use HasFactory;
    protected $fillable = [
        'mentor_id',
        'course_id',
    ];

    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
