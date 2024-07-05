<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoListController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\WallController;


Route::get('/', function () {
    return redirect()->route('dashboard');
});


Route::get('/dashboard', [WallController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/select-group', [GroupController::class, 'selectGroup'])->name('selectGroup');

Route::resource('groups', GroupController::class);
Route::resource('todos', TodoListController::class);

require __DIR__ . '/auth.php';
