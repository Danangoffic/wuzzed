<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Http\Controllers\admin\TamuKursusController;
use App\Http\Controllers\CourseCategories;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/guest-course/{id}/list', [TamuKursusController::class, 'list_tamu_kursus_api'])->name('api.guest-course');
    Route::post('/guest-course/status/{id}/payment', [TamuKursusController::class, 'count_tamu_status_payment'])->name('api.guest-course-status-payment');
    Route::get('/course/categories', [\App\Http\Controllers\admin\CourseCategoryController::class, 'get_by_api'])->name('api.category-course');

    Route::prefix('/order')->group(function(){
        Route::post('/', [\App\Http\Controllers\OrderController::class, 'store'])->name('api.order.store');
    });
    // Route::post('/mentor', [\App\Http\Controllers\admin\MentorController::class, 'store'])->name('api.mentor.store');
});
Route::get('/courses', function(Request $request){
    $course = \App\Models\Course::query();
    if($request->has('category')){
        $course->where('category_id', $request->category);
    }
    $courses = $course->with(['mentors', 'enrollments', 'category'])->get()->makeHidden(['created_at', 'updated_at', 'deleted_at']);
    return response()->json($courses);
});
Route::get('/categories', function(Request $request){
    $categories = CourseCategories::withWhereHas('courses', function (Builder $query) {
                                    $query
                                    ->with(['enrollments', 'mentors', 'reviews', 'user_course_activities'])
                                    ->where('jenis', 'live')
                                    ->where('status', 'published')
                                    ->orderBy('id', 'DESC');
                                })->orderBy('id', 'DESC')->get();
    return response()->json(['data' => $categories, 'status' => 'success']);
});
Route::get('/mentors', [\App\Http\Controllers\admin\MentorController::class, 'get_by_api'])->name('api.mentors');
