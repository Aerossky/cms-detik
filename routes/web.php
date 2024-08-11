<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {});

// admin page
Route::resource('admin', DashboardController::class);
Route::resource('user', UserController::class);
Route::resource('request', RequestController::class);
Route::resource('topic', TopicController::class);
