<?php

use Illuminate\Support\Facades\Route;

Route::get('/sports', [App\Http\Controllers\SportController::class, 'index']);
Route::get('/log-greetings', [App\Http\Controllers\SportController::class, 'logGreetings']);

Route::get('/julian', function() {
    return App\Julian::capitalize('julian pramana putra'); // result => My Name Is Name
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
