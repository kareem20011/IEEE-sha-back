<?php

use App\Http\Controllers\admin\EventBookController;
use App\Http\Controllers\website\EventController;
use App\Http\Controllers\MainErrorsController;
use App\Http\Controllers\website\AboutController;
use App\Http\Controllers\website\BoardController;
use App\Http\Controllers\website\ProfileController;
use App\Http\Controllers\website\WorkshopsController;
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

Route::get('/', function () {
    return view('website.pages.home');
});

Route::resource('events', EventController::class);


Route::get('workshops', [WorkshopsController::class, 'index'])->name('workshops.index');
Route::get('board', [BoardController::class, 'index'])->name('board.index');
Route::get('about', [AboutController::class, 'index'])->name('about.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'password'])->name('profile.password');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('verified', 'auth')->group(function(){
    Route::resource('event/booking', EventBookController::class);
});

require __DIR__.'/auth.php';

Route::group(['prefix' => 'errors', 'as' => 'errors.'],function(){
    Route::get('403', [MainErrorsController::class, 'error_403'])->name('403');
});

Route::get('/{any}', function () {
    return view('errors.404'); // Return a 404 HTTP status code
})->where('any', '.*'); // Wildcard to match any URI segment
