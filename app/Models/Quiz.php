<?php

namespace App\Models;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
                        'quiz_name',
                        'quiz_num_questions',
                        'quiz_min_score',
                        'lesson_id',
                    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
