<?php

namespace App\Models;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'choices',
        'answer',
        'quiz_id',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
