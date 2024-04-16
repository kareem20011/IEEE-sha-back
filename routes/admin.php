<?php

use App\Http\Controllers\admin\EventController;
use App\Http\Controllers\admin\UsersController;
use App\Models\Event;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'admin.'], function(){
    Route::get('/dashboard', function () {
        $recentEvents = Event::orderBy('created_at')->limit(3)->get();
        return view('admin.pages.dashboard', compact('recentEvents'));
    })->middleware(['auth', 'verified', 'isAdmin'])->name('dashboard');
    
    Route::resource('events', EventController::class);
    Route::resource('users', UsersController::class);
    Route::post('users/delete/{id}', [UsersController::class, 'delete'])->name('user.delete');
});