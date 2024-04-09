<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MajorController;

use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\MajorController as FrontendMajorController;
use App\Http\Controllers\Frontend\NewsController;
use App\Http\Controllers\Frontend\StudentRegisterController;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

Route::controller(StudentRegisterController::class)->group(function () {
   Route::get('/pendaftaran-murid', 'create')->name('student.register');
   Route::post('/pendaftaran-murid/store', 'store')->name('student.doRegister');
});

Route::controller(FrontendMajorController::class)->group(function () {
    Route::get('/jurusan', 'index')->name('jurusan');
    Route::get('/jurusan/{major}', 'show')->name('jurusan.sekolah');
});

Route::controller(NewsController::class)->group(function () {
    Route::get('/semua-berita', 'index')->name('berita');
    Route::get('/berita/kategori/{slug}', 'articleCategory')->name('kategori.berita');
});

Route::controller( AuthController::class)->prefix('auth')->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'doLogin')->name('doLogin');
});

//Admin Dashboard 
Route::prefix('admin')->middleware(['role:superadmin'])->group(function () {

    //Dashboard admin
    Route::controller(DashboardController::class )->group(function () {
        Route::get('/', 'index')->name('admin.dashboard');
    });
    
    //Logout from admin dashboard
    Route::controller(AuthController::class)->group(function () {
        Route::get('logout', 'logout')->name('admin.logout');
    });

    //Student controller 
    Route::controller(StudentController::class)->group(function () {
        Route::get('/students', 'index')->name('admin.student.index');
        Route::get('/students/create', 'create')->name('admin.student.create');
        Route::post('/students/store', 'store')->name('admin.student.store');
        Route::get('/students/edit/{student}', 'edit')->name('admin.student.edit');
        Route::patch('/students/update/{student}', 'update')->name('admin.student.update');
        Route::delete('/students/delete/{student}', 'destroy')->name('admin.student.delete');
        Route::get('/students/detail/{student}', 'show')->name('admin.student.detail');
    });

    //Teacher controller
    Route::controller(TeacherController::class)->group(function () {
        Route::get('/teachers', 'index')->name('admin.teacher.index');
        Route::get('/teachers/create', 'create')->name('admin.teacher.create');
        Route::post('/teachers/store', 'store')->name('admin.teacher.store');
        Route::get('/teachers/edit/{teacher}', 'edit')->name('admin.teacher.edit');
        Route::patch('/teachers/update/{teacher}', 'update')->name('admin.teacher.update');
        Route::delete('/teachers/delete/{teacher}', 'destroy')->name('admin.teacher.delete');
    });

    //Major Controller
    Route::controller(MajorController::class)->group(function () {
        Route::get('/majors', 'index')->name('admin.major.index');
        Route::get('/majors/create', 'create')->name('admin.major.create');
        Route::post('/majors/store', 'store')->name('admin.major.store');
        Route::get('/majors/edit/{major}', 'edit')->name('admin.major.edit');
        Route::patch('/majors/update/{major}', 'update')->name('admin.major.update');
        Route::delete('/majors/delete/{major}', 'destroy')->name('admin.major.delete');
    });

    //Category Controller
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories','index')->name('admin.category.index');
        Route::get('/categories/create','create')->name('admin.category.create');
        Route::post('/categories/store','store')->name('admin.category.store');
        Route::get('/categories/edit/{category}','edit')->name('admin.category.edit');
        Route::patch('/categories/update/{category}', 'update')->name('admin.category.update');
        Route::delete('/categories/delete/{category}', 'destroy')->name('admin.category.delete');
    });

    //Article Controller
    Route::controller(ArticleController::class)->group(function () {
        Route::get('/articles','index')->name('admin.article.index');
        Route::get('/articles/create', 'create')->name('admin.article.create');
        Route::post('/articles/store', 'store')->name('admin.article.store');
        Route::get('/articles/edit/{article}', 'edit')->name('admin.article.edit');
        Route::patch('/articles/update/{article}', 'update')->name('admin.article.update');
        Route::delete('/articles/delete/{article}', 'destroy')->name('admin.article.delete');
        Route::get('/articles/detail/{article}', 'show')->name('admin.article.detail');
    });
        
});

