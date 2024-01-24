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
    public $data = [];
    public function __construct()
    {
        $this->data['meta_title'] = 'Home';
        $this->data['meta_description'] = 'Home';
        $this->data['meta_keywords'] = 'kursus,online,belajar';
    }

    public function index()
    {
        $data[] = null;
        $phase = \App\Models\Setting::getValueByGroupAndParameter('SETTING', 'PHASE');

        // $phase = 0;
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
                                    ->with(['enrollments', 'mentors', 'reviews', 'user_course_activities'])
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
        $course = Course::with('reviews')->where(['slug' => $slug, 'status' => 'published'])->firstOrFail();
        if($course->jenis == 'live'){
            return redirect()->route('detail-webinar', $course->slug);
        }
        $hasEarlyBirdPrice = $course->early_bird_price > 0 && $course->early_bird_start > now() && $course->early_bird_end < now();
        $banks = \App\Models\Bank::all();
        $uniqueCodeTodayEnrollemnt = \App\Models\Enrollment::getUniqueCodeEnrollmentByCourse($course->id);
        $price = $course->price;
        if($hasEarlyBirdPrice){
            $price = $course->early_bird_price;
        }
        $this->data['meta_title'] = $course->title;
        $this->data['meta_description'] = $course->description;
        $this->data['meta_keywords'] = $course->title;
        $data = ['course' => $course, 'banks' => $banks, 'isEarlyBird' => $hasEarlyBirdPrice, 'unique_code' => $uniqueCodeTodayEnrollemnt, 'price' => $price];
        foreach ($data as $key => $value) {
            $this->data[$key] = $value;
        }

        return view('course.detail-course', $this->data);
    }

    public function detail_webinar(Request $request, $slug)
    {
        $live_data = Course::with('reviews')->where(['slug' => $slug, 'status' => 'published'])->firstOrFail();
        if($live_data->jenis == 'online'){
            return redirect()->route('detail-course', $slug);
        }
        $hasEarlyBirdPrice = $live_data->early_bird_price > 0 && $live_data->early_bird_start > now() && $live_data->early_bird_end < now();
        $uniqueCodeTodayEnrollemnt = \App\Models\Enrollment::getUniqueCodeEnrollmentByCourse($live_data ->id);
        $price = $live_data->price;
        if($hasEarlyBirdPrice){
            $price = $live_data->early_bird_price;
        }

        $banks = \App\Models\Bank::all();
        $this->data['meta_title'] = $live_data->title;
        $this->data['meta_description'] = $live_data->description;
        $this->data['meta_keywords'] = $live_data->title;
        $data = [
            'course' => $live_data,
            'banks' => $banks,
            'isEarlyBird' => $hasEarlyBirdPrice,
            'unique_code' => $uniqueCodeTodayEnrollemnt,
            'price' => $price
        ];
        // push $data to $this->data
        foreach ($data as $key => $value) {
            $this->data[$key] = $value;
        }
        return view('course.detail-webinar', $this->data);
    }
}
