<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\BoardController;
use App\Http\Controllers\admin\CatigoryController;
use App\Http\Controllers\admin\EventController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\WorkshopController;
use App\Models\Event;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'admin.'], function(){
    Route::get('/dashboard', function () {
        return view('admin.pages.dashboard');
    })->middleware(['auth', 'verified', 'isAdmin'])->name('dashboard');

    Route::group(['prefix' => 'settings', 'as' => 'settings.' ], function(){
        Route::get('/', [SettingsController::class, 'edit'])->name('edit');
        Route::post('/update', [SettingsController::class, 'update'])->name('update');
    });

    Route::resource('categories', CatigoryController::class);

    Route::resource('boards', BoardController::class);
    Route::get('boards/delete/{board}', [BoardController::class, 'delete'])->name('boards.delete');

    Route::resource('workshops', WorkshopController::class);
    Route::get('workshops/delete/{workshop}', [WorkshopController::class, 'delete'])->name('workshops.delete');
    
    Route::resource('events', EventController::class);
    Route::get('events/delete/{event}', [EventController::class, 'delete'])->name('events.delete');
    
    Route::resource('users', UsersController::class);
    Route::get('users/delete/{user}', [UsersController::class, 'delete'])->name('users.delete');

    Route::group(['prefix' => 'about', 'as' => 'about.' ], function(){
        Route::get('/', [AboutController::class, 'edit'])->name('edit');
        Route::post('/', [AboutController::class, 'update'])->name('update');
    });
    
});