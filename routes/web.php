<?php

use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\{
    BlogController,
    HomeController,
};
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/{locale}', function ($locale){
//   Session::put('locale', $locale);
//   return redirect()->back();
//})->name('trans');
Route::get('/', [HomeController::class, 'index'])->name('root');
Route::get('portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::resource('blog', BlogController::class);

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
