<?php

use App\Http\Controllers\Api\{
    BlogController,
    RegisterController,
    UserController,
    ProductController
};
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::controller(RegisterController::class)
    ->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::controller(UserController::class)
    ->prefix('user')
    ->name('user.')
    ->group(function () {
    Route::get('restore/{user}', 'restore')->name('restore');
    Route::get('force-delete/{user}', 'forceDelete')->name('force-delete');
});

Route::apiResource('blog', BlogController::class);
Route::apiResource('user', UserController::class)
    ->scoped(['user' => 'uuid']);


Route::get('product/{product}/toggle', [ProductController::class, 'toggleStatus']);
Route::apiResource('product', ProductController::class);
