<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConnectController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'storeLogin'])->name('login.store');
    Route::post('/register', [AuthController::class, 'storeRegister'])->name('register.store');

    Route::get('/faq', [ConnectController::class, 'faq'])->name('faq');
    Route::get('/privacy', [ConnectController::class, 'privacy'])->name('privacy');
    Route::get('/terms', [ConnectController::class, 'terms'])->name('terms.term');

    Route::controller(GoogleController::class)->group(function () {
        Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
        Route::get('auth/google/callback', 'handleGoogleCallback');

        Route::post('/profile/update-photo', [UserController::class, 'updatePhoto'])->name('profile.update.photo');
        Route::delete('/profile/delete-photo', [UserController::class, 'deletePhoto'])->name('profile.delete.photo');
        Route::put('/profile/update', [UserController::class, 'update'])->name('profile.update');
    });
});
Route::get('/job', [JobController::class, 'index'])->name('jobs.index');
Route::post('/job', [JobController::class, 'store'])->name('jobs.store');
Route::get('/job-profile', [JobController::class, 'jobProfile'])->name('job-profile');
