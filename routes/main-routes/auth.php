<?php

use App\Http\Controllers\VerificationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnectController;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobRecordController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\JobUserSavedController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RequestConnectionController; { {
    }
}

use App\Http\Controllers\MasterConnectionController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\GroupConnectionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;

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


    // Route::get('/message', [ConnectController::class, 'message'])->name('messages');
    Route::get('/notification', [ConnectController::class, 'notification'])->name('notifications');
    Route::get('/job', [ConnectController::class, 'job'])->name('jobs');
    Route::get('/profile', [ConnectController::class, 'profile'])->name('profile');
    // Route::get('/company-profile', [ConnectController::class, 'companyProfile'])->name('company-profile');
    Route::get('/job-profile', [ConnectController::class, 'jobProfile'])->name('job-profile');
    // Route::get('/not-found', [ConnectController::class, 'notFound'])->name('not-found');
    // routes/web.php

    Route::get('/coming-soon', [ConnectController::class, 'comingSoon'])->name('coming-soon');
    Route::get('/maintenance', [ConnectController::class, 'maintenance'])->name('maintenance');
    Route::get('/blogs', [ConnectController::class, 'blog'])->name('blogs');
    Route::get('/blogs/{blog:slug}', [ConnectController::class, 'blogSingle'])->name('blog-single');
    Route::get('/create-blog', [ConnectController::class, 'createBlog'])->name('create-blog');
    Route::get('/write-blog', [ConnectController::class, 'writeBlog'])->name('write-blog');
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
    Route::get('/profile/{user}', [UserController::class, 'show'])->name('user.post');
    Route::get('/search', [SearchController::class, 'search'])->name('search');
    Route::get('/list-profile', [SearchController::class, 'listProfile'])->name('list-profile');
    Route::get('/list-jobs', [SearchController::class, 'listJobs'])->name('list-jobs');
    Route::get('/list-company', [SearchController::class, 'listCompany'])->name('list-company');

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
        Route::post('/connections/{user}/send', [RequestConnectionController::class, 'sendConnection'])->name('connections.send');
        Route::post('/connections/{id}/accept', [RequestConnectionController::class, 'acceptConnection'])->name('connections.accept');
        Route::post('/connections/{id}/reject', [RequestConnectionController::class, 'rejectConnection'])->name('connections.reject');
        Route::get('/connections/requests', [RequestConnectionController::class, 'getRequests'])->name('connections.requests');
        Route::delete('/connections/disconnect/{id}', [MasterConnectionController::class, 'disconnect'])->name('connections.disconnect');
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/connections/list', [MasterConnectionController::class, 'index'])->name('connection.list');
        // Route::get('/messages', [MessagesController::class, 'index'])->name('messages.index');
        // Route::get('/messages/{id}', [MessagesController::class, 'show'])->name('messages.show');
        Route::get('/chat/user/{user}', [App\Http\Controllers\ChatController::class, 'chat'])->name('messages.show');
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/groups', [GroupConnectionController::class, 'index'])->name('groups.index');
        Route::post('/groups', [GroupConnectionController::class, 'store'])->name('groups.store');
        Route::get('/groups/{group}', [GroupConnectionController::class, 'show'])->name('groups.show');
        Route::post('/groups/{group}/join', [GroupConnectionController::class, 'join'])->name('groups.join');
        Route::post('/groups/{group}/leave', [GroupConnectionController::class, 'leave'])->name('groups.leave');
        Route::delete('/groups/{group}', [GroupConnectionController::class, 'destroy'])->name('groups.destroy');
        Route::post('/group/invite', [GroupConnectionController::class, 'invite'])->name('group.invite');
        Route::post('/group/invitation/accept', [GroupConnectionController::class, 'acceptInvitation'])->name('group.invitation.accept');
        Route::post('/group/invitation/reject', [GroupConnectionController::class, 'rejectInvitation'])->name('group.invitation.reject');
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/connections/messages/{user}', [MessagesController::class, 'index'])->name('connections.messages');
    });

    Route::get('/notifications', [NotificationController::class, 'showNotifications'])->name('notifications');


    Route::post('/company/store', [CompanyController::class, 'store'])->name('company.store');

    Route::get('/company-profile/{id}', [CompanyController::class, 'show'])->name('company.profile');



    Route::post('/education', [EducationController::class, 'store'])->name('education.store');
    Route::delete('/education/delete', [EducationController::class, 'destroy'])->name('education.destroy');

    Route::post('/experience', [ExperienceController::class, 'store'])->name('experience.store');
    Route::delete('/experience/{experience}', [ExperienceController::class, 'destroy'])->name('experience.destroy');

    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

    Route::get('/profile/{user:username}/posts/all', [PostController::class, 'allPosts'])->name('user.all.posts');

    require __DIR__ . '/message.php';
});