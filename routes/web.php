<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {});

// admin page
Route::resource('admin', DashboardController::class);
