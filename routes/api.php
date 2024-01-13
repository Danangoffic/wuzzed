<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\TamuKursusController;

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

    // Route::post('/mentor', [\App\Http\Controllers\admin\MentorController::class, 'store'])->name('api.mentor.store');
});
Route::get('/mentors', [\App\Http\Controllers\admin\MentorController::class, 'get_by_api'])->name('api.mentors');
