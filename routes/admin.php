<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::resource('blog', BlogController::class);
Route::resource('user', UserController::class);
Route::resource('profile', ProfileController::class);
