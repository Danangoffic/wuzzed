<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecentView extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    // list recent view data by studentId
    public static function listRecentView($studentId, $take = 8)
    {
        return RecentView::with('course')->where('user_id', $studentId)->orderBy('id', 'desc')->take($take)->get();
    }


    // create recent view data by studentId and courseId
    public static function createRecentView($studentId, $courseId)
    {
        // find recent view data by studentId and courseId
        $recentView = RecentView::where('user_id', $studentId)->where('course_id', $courseId)->first();
        if ($recentView) {
            $recentView->delete();
        }
        $recentView = new RecentView();
        $recentView->user_id = $studentId;
        $recentView->course_id = $courseId;
        $recentView->save();
        return $recentView;
    }
}
