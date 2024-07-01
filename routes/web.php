<?php

use App\Http\Controllers\PostExportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WallController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserExportController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [WallController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/postMessage', [WallController::class, 'write'])->name('publishMessage');

Route::get('/editMessageForm/{id}', [WallController::class, 'editMessageForm'])->name('editMessageForm');

Route::post('/updateMessage', [WallController::class, 'updateMessage'])->name('updateMessage');

Route::get('/deleteMessage/{id}', [WallController::class, 'delete'])->name('deleteMessage');


Route::get('/export-users', [UserExportController::class, 'export'])->name('exportUsers');
Route::get('/export-post', [PostExportController::class, 'export'])->name('exportPost');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
