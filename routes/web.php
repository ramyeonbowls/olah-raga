<?php

use Illuminate\Support\Facades\Route;
use App\Julian;

Route::get('/sports', [App\Http\Controllers\SportController::class, 'index']);
Route::get('/log-greetings', [App\Http\Controllers\SportController::class, 'logGreetings']);

Route::get('/julian', function() {
    return Julian::capitalize('julian pramana putra'); // result => My Name Is Name
});

Auth::routes();

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
