<?php

use App\Http\Controllers\VerificationController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnectController;
use App\Http\Controllers\ConnectionController;


Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::controller(VerificationController::class)->group(function () {
        Route::get('/email/verify', 'notice')->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}', 'verify')->name('verification.verify');
        Route::post('/email/resend', 'resend')->name('verification.resend');
    });
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', function () {
        return view('home.index');
    })->name('home');

    Route::get('/connect', [ConnectionController::class, 'index'])->name('connect.index');

    Route::get('/message', [ConnectController::class, 'message'])->name('messages');
    Route::get('/notification', [ConnectController::class, 'notification'])->name('notifications');
    Route::get('/job', [ConnectController::class, 'job'])->name('jobs');
    Route::get('/profile', [ConnectController::class, 'profile'])->name('profile');
    Route::get('/company-profile', [ConnectController::class, 'companyProfile'])->name('company-profile');
    Route::get('/job-profile', [ConnectController::class, 'jobProfile'])->name('job-profile');
    // Route::get('/not-found', [ConnectController::class, 'notFound'])->name('not-found');

    Route::get('/coming-soon', [ConnectController::class, 'comingSoon'])->name('coming-soon');
    Route::get('/maintenance', [ConnectController::class, 'maintenance'])->name('maintenance');
    Route::get('/blog', [ConnectController::class, 'blog'])->name('blogs');
    Route::get('/blog-single', [ConnectController::class, 'blogSingle'])->name('blog-single');
    Route::get('/components', [ConnectController::class, 'components'])->name('components');
    Route::get('/pricing', [ConnectController::class, 'pricing'])->name('pricing');
    Route::get('/contact', [ConnectController::class, 'contact'])->name('contact');
    // Route::get('/sign-in', [ConnectController::class, 'signIn'])->name('sign-in');
    // Route::get('/sign-up', [ConnectController::class, 'signUp'])->name('sign-up');
    Route::get('/forgot-password', [ConnectController::class, 'forgotPassword'])->name('forgot-password');
    Route::get('/edit-profile', [ConnectController::class, 'editProfile'])->name('edit-profile');
});
