<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\GuestCourseController;
use App\Http\Controllers\admin\MentorController;
use App\Http\Controllers\admin\TamuKursusController;
// use App\Http\Controllers\AuthController as UserAuthController;
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

    Route::middleware('admin_or_mentor')->group(function(){
        Route::post('/logout', function(Request $request){
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('admin.login');
        })->name('control.logout');
       Route::get('/', [HomeController::class, 'index'])->name('admin.index');

        Route::prefix('mentors')->group(function(){
            Route::get('/', [AdminMentorController::class, 'index'])->name('admin.mentor');
            Route::get('/add', [AdminMentorController::class, 'create'])->name('admin.mentor.add');
            Route::get('/edit/{id}', [AdminMentorController::class, 'edit'])->name('admin.mentor.edit');
            Route::post('/', [AdminMentorController::class, 'store'])->name('admin.mentor.store');
            Route::put('/{id}', [AdminMentorController::class, 'update'])->name('admin.mentor.update');
            Route::middleware('admin')->put('/{id}/password', [AdminMentorController::class, 'update_password'])->name('admin.mentor.password');
            Route::middleware('admin')->get('/add/{id}/user', [AdminMentorController::class, 'create_user'])->name('admin.mentor.add_user');
            Route::middleware('admin')->post('/add/{member_id}/user', [AdminMentorController::class, 'store_user'])->name('admin.mentor.store_user');
            Route::middleware('admin')->put('/update/{id}/user', [AdminMentorController::class, 'update_user_mentor'])->name('admin.mentor.update_user');
            Route::post('/course/add', [MentorController::class, 'store_in_course'])->name('admin.mentor.store_in_course');
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

            Route::get('/{course}/tamu/{id}', [TamuKursusController::class, 'show'])->name('admin.tamu.show');
            Route::prefix('tamu')->group(function(){
                Route::get('/{id}/add', [TamuKursusController::class, 'create'])->name('admin.tamu.add');
                Route::post('/{id}', [TamuKursusController::class, 'store'])->name('admin.tamu.create');

                Route::put('/{id}/update', [TamuKursusController::class, 'update'])->name('admin.tamu.update');
            });
        });

        Route::middleware('admin')->group(function(){
            Route::prefix('category')->group(function(){
                Route::get('/', [\App\Http\Controllers\admin\CourseCategoryController::class, 'index'])->name('admin.category.index');
                Route::get('/create', [\App\Http\Controllers\admin\CourseCategoryController::class, 'create'])->name('admin.category.create');
                Route::post('/', [\App\Http\Controllers\admin\CourseCategoryController::class, 'store'])->name('admin.category.store');
                Route::get('/{id}/detail', [\App\Http\Controllers\admin\CourseCategoryController::class, 'show'])->name('admin.category.show');
                Route::get('/{id}/edit', [\App\Http\Controllers\admin\CourseCategoryController::class, 'edit'])->name('admin.category.edit');
                Route::put('/{id}/update', [\App\Http\Controllers\admin\CourseCategoryController::class, 'update'])->name('admin.category.update');
                Route::delete('/{id}/delete', [\App\Http\Controllers\admin\CourseCategoryController::class, 'destroy'])->name('admin.category.destroy');
            });

            Route::prefix('user')->group(function(){
                Route::get('/', [\App\Http\Controllers\admin\UserController::class, 'index'])->name('admin.user');
                Route::get('/create', [\App\Http\Controllers\admin\UserController::class, 'create'])->name('admin.user.create');
                Route::post('/', [\App\Http\Controllers\admin\UserController::class, 'store'])->name('admin.user.store');
                Route::get('/{id}', [\App\Http\Controllers\admin\UserController::class, 'show'])->name('admin.user.show');
                Route::get('/{id}/edit', [\App\Http\Controllers\admin\UserController::class, 'edit'])->name('admin.user.edit');
                Route::put('/{id}/update', [\App\Http\Controllers\admin\UserController::class, 'update'])->name('admin.user.update');
                Route::delete('/{id}/delete', [\App\Http\Controllers\admin\UserController::class, 'destroy'])->name('admin.user.destroy');
            });

            Route::prefix('setting')->group(function(){
                Route::get('/', [\App\Http\Controllers\admin\SettingController::class, 'index'])->name('admin.setting');
                Route::get('/create', [\App\Http\Controllers\admin\SettingController::class, 'create'])->name('admin.setting.create');
                Route::post('/', [\App\Http\Controllers\admin\SettingController::class, 'store'])->name('admin.setting.store');
                Route::get('/{id}', [\App\Http\Controllers\admin\SettingController::class, 'show'])->name('admin.setting.show');
                Route::get('/{id}/edit', [\App\Http\Controllers\admin\SettingController::class, 'edit'])->name('admin.setting.edit');
                Route::put('/{id}/update', [\App\Http\Controllers\admin\SettingController::class, 'update'])->name('admin.setting.update');
                Route::delete('/{id}/delete', [\App\Http\Controllers\admin\SettingController::class, 'destroy'])->name('admin.setting.destroy');
            });

            Route::prefix('student')->group(function(){
                Route::get('/', [\App\Http\Controllers\admin\StudentController::class, 'index'])->name('admin.student');
                Route::get('/{id}', [\App\Http\Controllers\admin\StudentController::class, 'show'])->name('admin.student.show');
                Route::get('/create', [\App\Http\Controllers\admin\StudentController::class, 'create'])->name('admin.student.create');
                Route::post('/', [\App\Http\Controllers\admin\StudentController::class, 'store'])->name('admin.student.store');
                Route::get('/{id}/edit', [\App\Http\Controllers\admin\StudentController::class, 'edit'])->name('admin.student.edit');
                Route::put('/{id}/update', [\App\Http\Controllers\admin\StudentController::class, 'update'])->name('admin.student.update');
                Route::delete('/{id}/delete', [\App\Http\Controllers\admin\StudentController::class, 'destroy'])->name('admin.student.destroy');
            });

            Route::prefix('settings')->group(function(){
                Route::get('/', [\App\Http\Controllers\admin\SettingController::class, 'index'])->name('admin.settings');
                Route::get('/create', [\App\Http\Controllers\admin\SettingController::class, 'create'])->name('admin.settings.create');
                Route::post('/', [\App\Http\Controllers\admin\SettingController::class, 'store'])->name('admin.settings.store');
                Route::get('/{id}', [\App\Http\Controllers\admin\SettingController::class, 'show'])->name('admin.settings.show');
                Route::get('/{id}/edit', [\App\Http\Controllers\admin\SettingController::class, 'edit'])->name('admin.settings.edit');
                Route::put('/{id}/update', [\App\Http\Controllers\admin\SettingController::class, 'update'])->name('admin.settings.update');
                Route::delete('/{id}/destroy', [\App\Http\Controllers\admin\SettingController::class, 'destroy'])->name('admin.settings.destroy');
            });

            Route::prefix('orders')->group(function(){
                Route::get('/', [\App\Http\Controllers\admin\OrderController::class, 'index'])->name('admin.orders');
                Route::get('/{id}/edit', [\App\Http\Controllers\admin\OrderController::class, 'edit'])->name('admin.orders.edit');
                Route::put('/{id}/update', [\App\Http\Controllers\admin\OrderController::class, 'update'])->name('admin.orders.update');

            });

            Route::prefix('setting-sections')->group(function(){
                Route::get('/', [\App\Http\Controllers\admin\SectionController::class, 'index'])->name('admin.setting.sections');

            });

            Route::prefix('setting-content')->group(function(){
                Route::get('/', [\App\Http\Controllers\admin\ContentWidgetController::class, 'index'])->name('admin.setting.content');


            });
        });
    });
});

Route::get('/', [GuestController::class, 'index'])->name('home');
Route::middleware('guest')->group(function(){
    Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('/login', [App\Http\Controllers\AuthController::class, 'doLogin'])->name('login.store');

    Route::get('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
    Route::post('/register', [App\Http\Controllers\AuthController::class, 'doRegister'])->name('register.store');
});

Route::middleware('student')->group(function(){
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});

Route::get('/kursus', [GuestCourseController::class,'index'])->name('kursus.index');
Route::get('/kursus/{slug}', [GuestCourseController::class, 'show'])->name('kursus.show');
Route::post('/kursus/{slug}/register/{id}', [GuestCourseController::class, 'store'])->name('kursus.register');

Route::get('/course/{slug?}', [GuestController::class, 'detail_course'])->name('detail-course');
Route::get('/webinar/{slug}', [GuestController::class, 'detail_webinar'])->name('detail-webinar');
