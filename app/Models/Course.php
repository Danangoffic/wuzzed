<?php

namespace App\Models;

use App\Models\Mentor;
use App\Models\Enrollment;
use App\Models\GuestCourse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected

    $fillable = [
        'name',
        'slug',
        'certificate',
        'thumbnail',
        'type',
        'jenis',
        'category_id',
        'description',
        'price',
        'level',
        'duration',
        'status',
        'mentor_name',
        'start_course',
        'early_bird',
        'early_bird_price',
    ];

    /**
    * Get the users that are enrolled in the course.
    */
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    /**
    * Get the mentors that teach the course.
    */
    public function mentors()
    {
        return $this->belongsToMany(Mentor::class);
    }

    public function guestcourses()
    {
        return $this->hasMany(GuestCourse::class);
    }

    /**
     * Get the category that owns the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(CourseCategories::class, 'category_id', 'id');
    }
}
