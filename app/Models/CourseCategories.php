<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseCategories extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'thumbnail'];

    /**
     * Get all of the courses for the CourseCategories
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses()
    {
        return $this->hasMany(Course::class, 'category_id', 'id');
    }
}
