<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
// use App\Models\CourseCategories;
use Illuminate\Contracts\Database\Eloquent\Builder;

class GuestController extends Controller
{
    //
    public function index()
    {
        $data[] = null;
        $phase = 0;
        if($phase > 0){
            if(auth()->check() && auth()->user()->role == 'student'){
                // get current user course activity that not completed yet in learning_progress table
                // $data = User::with('learning_progress')->where('id', auth()->user()->id)->first();
                $user = auth()->user();
                // dd($user);
                $active_learning = \App\Models\LearningProgress::where('user_id', $user->id)
                                            ->selectRaw('course_id, MAX(id) as id')->groupBy('course_id')
                                            ->where('completed', 0)->orderBy('id', 'desc')->take(8)->get();
                $data['active_lessons'] = Course::whereIn('id', $active_learning->pluck('course_id'))
                                            ->with(
                                                [
                                                    'learning_progress',
                                                    'learning_progress.chapter',
                                                    'learning_progress.lesson'
                                                ]
                                            )
                                            ->get();
                // dd($data['active_lessons']);
                $data['active_courses'] = $user->student->whereHas('learning_progress', function ($query) {
                                                $query->where('completed', 0)->selectRaw('course_id, MAX(id) as id')->groupBy('course_id');
                                            })->with('learning_progress.course')->get();
                $data['completed_courses'] = $user->student->whereHas('learning_progress', function($query){
                                                $query->where('completed', 1)->groupBy('course_id');
                                            })->with('learning_progress.course')->get();
            }
            $data['popular_courses'] = Course::withCount(['enrollments'])->orderBy('enrollments_count', 'desc')->take(8)->get();
            // dd($data['popular_courses']);
            $data['top_favorite_courses'] = Course::withCount(['favorites'])
                                    ->with(['favorites' => function($query){
                                        $query->where('user_id', auth()->user()->id);
                                    }])
                                    ->orderBy('favorites_count', 'desc')->take(10)->get();
            // get most course activity by course id from user_course_activities, and get lessons count from lessons table
            $data['most_active_courses'] = Course::withCount(['user_course_activities'])->orderBy('user_course_activities_count', 'desc')->take(10)->get();
        }


        $categories = \App\Models\CourseCategories::withWhereHas('courses', function (Builder $query) {
                                    $query
                                    ->where('jenis', 'live')
                                    ->where('status', 'published')
                                    ->orderBy('id', 'DESC');
                        })->orderBy('id', 'DESC')->get();

        // dd($categories);
        $data['live_course'] = $categories;
        // dd($data['live_course']);
        return view('index', $data);
    }

    public function detail_course(Request $request, $slug)
    {
        $course = Course::getDetailCourseBySlug($slug);
        return view('detail-course', ['course' => $course]);
    }

    public function detail_webinar(Request $request, $slug)
    {
        $live_data = Course::with('reviews')->where('slug', $slug)->firstOrFail();
        return view('detail-webinar', ['course' => $live_data]);
    }
}
