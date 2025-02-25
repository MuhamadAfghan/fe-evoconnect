<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConnectController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;

// 🔹 Routes untuk Guest (Belum Login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'storeLogin'])->name('login.store');
    Route::post('/register', [AuthController::class, 'storeRegister'])->name('register.store');

    // 🔹 Google OAuth
    Route::controller(GoogleController::class)->group(function () {
        Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
        Route::get('auth/google/callback', 'handleGoogleCallback');
    });

    // 🔹 Reset Password
    Route::get('/forgot-password', [ConnectController::class, 'forgotPassword'])->name('forgot-password');
    Route::post('/forgot-password', [AuthController::class, 'storeForgotPassword'])->name('forgot-password.store');
    Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'storeResetPassword'])->name('password.update');
});