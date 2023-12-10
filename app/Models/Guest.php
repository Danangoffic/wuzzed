<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
