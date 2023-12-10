<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mentor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'biography',
        'profile_picture',
    ];

    /**
    * Get the courses that the mentor teaches.
    */
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

}
