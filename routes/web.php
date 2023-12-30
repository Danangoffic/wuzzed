<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\HomeController;
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

    // KURSUS ROUTES

    Route::prefix('kursus')->group(function(){
        Route::get('/', [KursusAdminController::class, 'index'])->name('admin.kursus');
        Route::get('/add', [KursusAdminController::class, 'create'])->name('admin.kursus.add');
        Route::post('/', [KursusAdminController::class, 'store'])->name('admin.kursus.store');
        Route::get("/{course}/edit", [KursusAdminController::class, 'edit'])->name('admin.kursus.edit');
        Route::get("/{id}", [KursusAdminController::class, 'show'])->name('admin.kursus.show');
        Route::put("/{course}", [KursusAdminController::class, 'update'])->name('admin.kursus.update');
        Route::delete('/{id}', [KursusAdminController::class, 'destroy'])->name('admin.kursus.destroy');
    });
});

// Route::get('/', [GuestController::class, 'index']);
Route::get('/', [GuestController::class, 'index'])->name('home');
Route::get('/login', [GuestController::class, 'login'])->name('login');
Route::get('/register', [GuestController::class, 'register'])->name('register');
Route::get('/profile', [GuestController::class, 'profile'])->name('profile');
