<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\GuestCourseController;
use App\Http\Controllers\admin\TamuKursusController;
use App\Http\Controllers\admin\KursusAdminController;
use App\Http\Controllers\admin\MentorController as AdminMentorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('/admin')->group(function(){
    Route::get('/login', [AuthController::class, 'login'])->name('admin.login');
    Route::get('/register', [AuthController::class, 'create'])->name('admin.register');
    Route::post('/login', [AuthController::class, 'doLogin'])->name('admin.dologin');
    Route::post('/register', [AuthController::class, 'store'])->name('admin.user.store');
    Route::get('/', [HomeController::class, 'index'])->name('admin.index');

    Route::prefix('mentors')->group(function(){
        Route::get('/', [AdminMentorController::class, 'index'])->name('admin.mentor');
        Route::get('/add', [AdminMentorController::class, 'create'])->name('admin.mentor.add');
        Route::get('/edit/{mentor}', [AdminMentorController::class, 'edit'])->name('admin.mentor.edit');
        Route::post('/', [AdminMentorController::class, 'store'])->name('admin.mentor.store');
        Route::put('/{mentor}', [AdminMentorController::class, 'update'])->name('admin.mentor.update');
    });

    // ADMIN KURSUS ROUTES

    Route::prefix('kursus')->group(function(){
        Route::get('/', [KursusAdminController::class, 'index'])->name('admin.kursus');
        Route::get('/add', [KursusAdminController::class, 'create'])->name('admin.kursus.add');
        Route::post('/', [KursusAdminController::class, 'store'])->name('admin.kursus.store');
        Route::get("/{course}/edit", [KursusAdminController::class, 'edit'])->name('admin.kursus.edit');
        Route::get("/{id}", [KursusAdminController::class, 'show'])->name('admin.kursus.show');
        Route::put("/{course}", [KursusAdminController::class, 'update'])->name('admin.kursus.update');
        Route::delete('/{id}', [KursusAdminController::class, 'destroy'])->name('admin.kursus.destroy');

        Route::prefix('tamu')->group(function(){
            Route::get('/{id}/add', [TamuKursusController::class, 'create'])->name('admin.tamu.add');
            Route::post('/{id}', [TamuKursusController::class, 'store'])->name('admin.tamu.create');
            Route::get('/{id}', [TamuKursusController::class, 'show'])->name('admin.tamu.show');
            Route::put('/{id}/update', [TamuKursusController::class, 'update'])->name('admin.tamu.update');
        });
    });
});

Route::get('/', [GuestController::class, 'index']);
Route::get('/kursus', [GuestCourseController::class,'index'])->name('kursus.index');
Route::get('/kursus/{slug}', [GuestCourseController::class, 'show'])->name('kursus.show');
Route::post('/kursus/{slug}/register/{id}', [GuestCourseController::class, 'store'])->name('kursus.register');
