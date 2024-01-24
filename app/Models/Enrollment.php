<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

class Enrollment extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'user_id',
        'course_id',
        'status',
        'is_paid',
    ];

    /**
     * Get the user that enrolled in the course.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the course that the user enrolled in.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public static function getUniqueCodeEnrollmentByCourse($course_id)
    {
        $today = Carbon::now();

        // Menghitung jumlah pendaftaran unik hari ini untuk kursus tertentu
        $todayUniqueEnrollments = self::where('course_id', $course_id)
            ->whereDate('created_at', $today)
            ->count();

        // Menetapkan awalan nomor unik
        $prefixUniqueNumber = $todayUniqueEnrollments + 1;

        // Menghasilkan kode unik dengan panjang tetap 3 digit
        return intval(str_pad($prefixUniqueNumber, 3, mt_rand(1, 9), STR_PAD_LEFT));
    }
}
