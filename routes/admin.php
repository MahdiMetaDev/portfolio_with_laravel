<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::resource('blog', BlogController::class);
Route::resource('user', UserController::class);
Route::resource('profile', ProfileController::class);
Route::resource('role', RoleController::class);
Route::resource('country', CountryController::class);
Route::resource('city', CityController::class);
