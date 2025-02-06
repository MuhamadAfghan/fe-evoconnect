<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConnectController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'storeLogin'])->name('login.store');
    Route::post('/register', [AuthController::class, 'storeRegister'])->name('register.store');

    Route::get('/faq', [ConnectController::class, 'faq'])->name('faq');
    Route::get('/privacy', [ConnectController::class, 'privacy'])->name('privacy');
    Route::get('/terms', [ConnectController::class, 'terms'])->name('terms.term');
});
