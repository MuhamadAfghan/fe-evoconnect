<?php

use App\Http\Controllers\VerificationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnectController;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobRecordController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\JobUserSavedController;
use App\Http\Controllers\NotificationController;
use App\Models\RequestConnection;
use App\Http\Controllers\RequestConnectionController;
use App\Http\Controllers\MasterConnectionController;

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
    // routes/web.php

    Route::get('/coming-soon', [ConnectController::class, 'comingSoon'])->name('coming-soon');
    Route::get('/maintenance', [ConnectController::class, 'maintenance'])->name('maintenance');
    Route::get('/blog', [ConnectController::class, 'blog'])->name('blogs');
    Route::get('/blog-single', [ConnectController::class, 'blogSingle'])->name('blog-single');
    Route::get('/create-blog', [ConnectController::class, 'createBlog'])->name('create-blog');
    Route::get('/form-blog', [ConnectController::class, 'formBlog'])->name('form-blog');
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
    Route::post('/profile/medsos', [UserController::class, 'medsos'])->name('profile.update.medsos');
    Route::post('/profile/save', [UserController::class, 'updateSave'])->name('profile.save');
    Route::get('/profile/{user}', [UserController::class, 'show'])->name('user.detail');


    Route::middleware(['auth'])->group(function () {
        Route::post('/jobs/save', [JobUserSavedController::class, 'saveJob'])->name('jobs.save');
        Route::get('/jobs/saved', [JobUserSavedController::class, 'savedJobs'])->name('jobs.saved');
    });


    // 🔹 Routes untuk Jobs (RESTful)
    Route::prefix('jobs')->group(function () {
        Route::get('/', [JobController::class, 'index'])->name('jobs.index'); // List semua job
        Route::post('/', [JobController::class, 'store'])->name('jobs.store'); // Tambah job
        Route::get('/{job}', [JobController::class, 'jobProfile'])->name('jobs-profile'); // Detail job
        Route::put('/jobs/{job}/update-photo', [JobController::class, 'updatePhotoJob'])->name('job.update.photo');
        Route::delete('/{job}/delete-photo', [JobController::class, 'deletePhotoJob'])->name('job.delete.photo');
        Route::post('/{job}/apply', [JobController::class, 'apply'])->name('job.apply');
    });

    Route::middleware(['auth'])->group(function () {
        Route::post('/connections/send/{user}', [RequestConnectionController::class, 'sendConnection'])->name('connections.send');
        Route::post('/connections/{id}/accept', [RequestConnectionController::class, 'acceptConnection']);
        Route::post('/connections/{id}/reject', [RequestConnectionController::class, 'rejectConnection']);
        Route::delete('/connections/disconnect/{user}', [RequestConnectionController::class, 'disconnect'])->name('connections.disconnect');
        Route::get('/connections/requests', [RequestConnectionController::class, 'getRequests']);
    });


    Route::middleware(['auth'])->group(function () {
        Route::get('/connections/list', [MasterConnectionController::class, 'index'])->name('connection.list');
    });

    Route::get('/notifications', [NotificationController::class, 'showNotifications'])->name('notifications');


    Route::post('/companies/store', [CompanyController::class, 'store'])->name('companies.store');

    Route::post('/education', [EducationController::class, 'store'])->name('education.store');
    Route::delete('/education/delete', [EducationController::class, 'destroy'])->name('education.destroy');

    Route::post('/experience', [ExperienceController::class, 'store'])->name('experience.store');
    Route::delete('/experience/{experience}', [ExperienceController::class, 'destroy'])->name('experience.destroy');
});
