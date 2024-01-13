<?php

namespace App\Models;

use App\Models\User;
use App\Models\LearningProgress;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'name', 'email', 'phone', 'address', 'gender'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the learning_progress for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function learning_progress()
    {
        return $this->hasMany(LearningProgress::class, 'student_id', 'id');
    }
}
