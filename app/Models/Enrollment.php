<?php

namespace App\Models;

use App\Models\Guest;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enrollment extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'user_id',
        'course_id',
        'status',
        'is_paid',
    ];

    /**
     * Get the user that enrolled in the course.
     */
    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    /**
     * Get the course that the user enrolled in.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
