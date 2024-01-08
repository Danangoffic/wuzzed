<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningProgress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'student_id',
        'course_id',
        'chapter_id',
        'lesson_id',
        'completed',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function scopeCompleted($query)
    {
        return $query->where('completed', true);
    }

    public function scopeNotCompleted($query)
    {
        return $query->where('completed', false);
    }

    // get total lesson counters by course
    public function scopeTotalLesson($query, $course_id)
    {
        return $query->where('course_id', $course_id)->count();
    }

}
