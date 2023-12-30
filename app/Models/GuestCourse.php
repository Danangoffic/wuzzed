<?php

namespace App\Models;

use App\Models\Guest;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GuestCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'guest_id',
        'status_payment',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }
}
