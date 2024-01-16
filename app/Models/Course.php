<?php

namespace App\Models;

use App\Models\User;
use App\Models\Mentor;
use App\Models\Enrollment;
use App\Models\GuestCourse;
use App\Models\MentorsCourse;
use App\Models\UserCourseActivity;
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
        'poster',
        'url_kursus',
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
        return $this->belongsToMany(Mentor::class, MentorsCourse::class);
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

    // has many students
    public function students()
    {
        return $this->belongsToMany(User::class, 'enrollments', 'course_id', 'user_id');
    }

    // favorites
    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorite_courses', 'course_id', 'user_id');
    }

    // user_course_activities
    public function user_course_activities()
    {
        return $this->hasMany(UserCourseActivity::class);
    }

    // get detail course by slug
    public static function getDetailCourseBySlug($slug)
    {
        return Course::with('category', 'mentors', 'enrollments')->where('slug', $slug)->firstOrFail();
    }


}
