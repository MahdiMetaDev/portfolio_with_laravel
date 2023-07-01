<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;

Route::resource('blog', BlogController::class);
Route::resource('user', UserController::class);
Route::resource('profile', ProfileController::class);
Route::get('portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
