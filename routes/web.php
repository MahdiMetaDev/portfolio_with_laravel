<?php

use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Web\BlogController;
use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('root');
Route::get('portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::resource('blog', BlogController::class);
