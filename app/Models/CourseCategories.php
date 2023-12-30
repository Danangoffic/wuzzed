<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategories extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'thumbnail'];

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
