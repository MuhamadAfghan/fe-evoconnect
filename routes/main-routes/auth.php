<?php

use App\Http\Controllers\VerificationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnectController;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::controller(VerificationController::class)->group(function () {
        Route::get('/email/verify', 'notice')->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}', 'verify')->name('verification.verify');
        Route::post('/email/resend', 'resend')->name('verification.resend');
    });
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/auth/fill-username', [AuthController::class, 'fillUsername'])->name('auth.fill-username');
    Route::post('/auth/fill-username', [AuthController::class, 'storeUsername'])->name('auth.store-username');
});

Route::middleware(['auth', 'verified', 'isFilledUsername'])->group(function () {

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
    Route::get('/edit-profile', [ConnectController::class, 'editProfile'])->name('edit-profile');
    Route::post('/profile/update-photo', [UserController::class, 'updatePhoto'])->name('profile.update.photo');
    Route::delete('/profile/delete-photo', [UserController::class, 'deletePhoto'])->name('profile.delete.photo');
    Route::put('/profile/update', [UserController::class, 'update'])->name('profile.update');
    Route::post('/profile/update-about', [UserController::class, 'updateAbout'])->name('profile.update.about');

    // 🔹 Routes untuk Jobs (RESTful)
    Route::prefix('jobs')->group(function () {
        Route::get('/', [JobController::class, 'index'])->name('jobs.index'); // List semua job
        Route::post('/', [JobController::class, 'store'])->name('jobs.store'); // Tambah job
        Route::get('/{job}', [JobController::class, 'jobProfile'])->name('jobs-profile'); // Detail job
        Route::post('/jobs/{job}/update-photo', [JobController::class, 'updatePhotoJob'])->name('job.update.photo');
        Route::delete('/jobs/{job}/delete-photo', [JobController::class, 'deletePhotoJob'])->name('job.delete.photo');
    });

    Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store'); // Tambah perusahaan
});
