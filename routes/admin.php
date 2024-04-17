<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\EventController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\admin\UsersController;
use App\Models\Event;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'admin.'], function(){
    Route::get('/dashboard', function () {
        $recentEvents = Event::orderBy('created_at')->limit(3)->get();
        return view('admin.pages.dashboard', compact('recentEvents'));
    })->middleware(['auth', 'verified', 'isAdmin'])->name('dashboard');
    
    Route::get('/settings', [SettingsController::class, 'edit'])->name('settings');
    Route::post('/settings/update', [SettingsController::class, 'update'])->name('settings.update');

    Route::resource('events', EventController::class);
    Route::resource('users', UsersController::class);
    Route::group(['prefix' => 'about', 'as' => 'about.' ], function(){
        Route::get('/', [AboutController::class, 'edit'])->name('edit');
        Route::post('/', [AboutController::class, 'update'])->name('update');
    });
    Route::post('users/delete/{id}', [UsersController::class, 'delete'])->name('user.delete');
});