<?php

use App\Http\Controllers\admin\EventController;
use App\Http\Controllers\admin\UsersController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'admin.'], function(){
    Route::get('/dashboard', function () {
        return view('admin.pages.dashboard');
    })->middleware(['auth', 'verified', 'isAdmin'])->name('dashboard');
    
    Route::resource('events', EventController::class);
    Route::resource('users', UsersController::class);
    Route::post('users/delete/{id}', [UsersController::class, 'delete'])->name('user.delete');
});