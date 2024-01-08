<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Chapter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserCourseActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'chapter_id',
        'lesson_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
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

    // get courses activity user
    public static function getCoursesActivityUser($userId)
    {
        return UserCourseActivity::with('course')->where('user_id', $userId)->groupBy('course_id')->get();
    }
}
