<?php

use App\Http\Controllers\Admin\{
    BlogController,
    CityController,
    CountryController,
    DashboardController,
    ProfileController,
    RoleController,
    UserController,
};


Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('search', [UserController::class, 'search']);
Route::resource('user', UserController::class)->parameter('user', 'user:uuid');

Route::resources([
    'blog' => BlogController::class,
    'profile' => ProfileController::class,
    'role' => RoleController::class,
    'country' => CountryController::class,
    'city' => CityController::class,
]);
