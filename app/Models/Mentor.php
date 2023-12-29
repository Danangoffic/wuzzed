<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mentor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'profile_picture',
        'profession',
    ];

    /**
    * Get the courses that the mentor teaches.
    */
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'mentors_courses', 'mentor_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
