<?php

namespace App\Models;

use App\Models\Quiz;
use App\Models\Chapter;
use App\Models\LessonVideo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'chapter_id',
        'name',
        'slug',
        'type',
    ];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    // video
    public function video()
    {
        return $this->hasOne(LessonVideo::class);
    }

    // quiz

    public function quiz()
    {
        return $this->hasMany(Quiz::class, 'lesson_id', 'id');
    }
}
