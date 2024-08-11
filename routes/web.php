<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginUser'])->name('login.user');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerUser'])->name('register.user');

// Logout Route
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'course'])->name('courses.search');
Route::get('/course', [HomeController::class, 'course'])->name('course');
// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get('/my-course', [HomeController::class, 'mycourse'])->name('mycourse');
    Route::get('/course/{id}', [HomeController::class, 'courseShow'])->name('course.show');
    Route::post('/course/request/{id}', [HomeController::class, 'requestCourse'])->name('course.request');

    // Admin and Super Admin Routes
    Route::middleware('role:admin,super_admin')->group(function () {
        Route::resource('admin', DashboardController::class);

        Route::resource('topic', TopicController::class);
        Route::resource('request', RequestController::class);
        Route::patch('/requests/{id}/update-status', [RequestController::class, 'updateStatus'])->name('request.updateStatus');
    });

    // Super Admin Routes
    Route::middleware('role:super_admin')->group(function () {
        Route::resource('user', UserController::class);
    });
});
