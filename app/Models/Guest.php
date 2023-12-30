<?php

namespace App\Models;

use App\Models\GuestCourse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
                    'name',
                    'phone',
                    'email',
                    'province_id',
                    'city_id',
                    'company_name',
                    'job_title',
                    'knows_from',
                ];

    public function guestcourses()
    {
        return $this->hasMany(GuestCourse::class);
    }
}
