<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentBlogController;
use App\Http\Controllers\CommentPostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnectController;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Http\Request;

// Route::group(['prefix' => 'api', 'middleware' => 'auth'], function () {

// blog biasa
Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'blogs'], function () {
        Route::get('/', [BlogController::class, 'index']);
        Route::post('/', [BlogController::class, 'store'])->name('blogs.store');
        Route::get('/{blog}', [BlogController::class, 'show']);
        Route::put('/{blog}', [BlogController::class, 'update']);
        Route::delete('/{blog}', [BlogController::class, 'destroy']);

        //comment blog
        Route::group(['prefix' => 'comments'], function () {
            Route::get('/{blog_id}', [CommentBlogController::class, 'index']);
            Route::post('/{blog_id}', [CommentBlogController::class, 'store']);
            Route::delete('/{comment_id}', [CommentBlogController::class, 'destroy']);
        });
    });

    //post
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', [PostController::class, 'index'])->name('posts.index');
        Route::get('/my-posts', [PostController::class, 'myPosts'])->name('posts.my-posts');
        // Route::get('/{id}', [PostController::class, 'userPosts'])->name('posts.user-posts');
        Route::post('/', [PostController::class, 'store'])->name('posts.store');
        Route::get('/{post}', [PostController::class, 'show'])->name('posts.show');
        Route::put('/{post}', [PostController::class, 'update'])->name('posts.update');
        Route::delete('/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
        Route::post('/{post}/like', [PostController::class, 'like'])->name('posts.like');
        Route::post('/{post}/comment', [PostController::class, 'storeComment']);
        Route::get('/{post}/comments', [PostController::class, 'getComments']);
    });

    Route::group(['prefix' => 'comments'], function () {
        Route::get('/{post_id}', [CommentPostController::class, 'index']);
        Route::post('/{post_id}', [CommentPostController::class, 'store']);
        Route::delete('/{comment_id}', [CommentPostController::class, 'destroy']);

        Route::post('/{commentPost}/reply', [CommentPostController::class, 'storeReply']);
    });

    Route::group(['prefix' => 'comment-blogs'], function () {
        Route::get('/{blog}', [CommentBlogController::class, 'index']); // Gunakan {blog} agar sesuai dengan controller
        Route::post('/{blog}', [CommentBlogController::class, 'store']);
        Route::delete('/comment/{comment}', [CommentBlogController::class, 'destroy']); // Ubah jadi /comment/{comment}
    });

    //user
    Route::group(['prefix' => 'users'], function () {
        // Route::get('/', [UserController::class, 'index'])->name('users.index');
        // Route::post('/', [UserController::class, 'store'])->name('users.store');
        // Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
        // Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
        // Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');

        //update social media
        Route::put('/{user}/social-media', [UserController::class, 'updateSocialMedia'])->name('users.update.social-media');
        Route::post('/about', [UserController::class, 'updateAbout'])->name('users.update.about'); // Route::put('/{id}', function ($id) {});r

        Route::group(['prefix' => 'education'], function () {
            Route::get('/', [EducationController::class, 'index'])->name('education.index');
            Route::post('/', [EducationController::class, 'store'])->name('education.store');
            Route::get('/{education}', [EducationController::class, 'show'])->name('education.show');
            Route::put('/{education}', [EducationController::class, 'update'])->name('education.update');
            Route::delete('/{education}', [EducationController::class, 'destroy'])->name('education.destroy');
        });

        Route::get('/{user:id}/posts/all', [PostController::class, 'getAllPosts']);
        Route::get('/{user}/posts', [PostController::class, 'userPosts']);
        Route::get('/api/posts', function (Request $request) {
            return Post::all();
        });

        Route::group(['prefix' => 'experience'], function () {
            Route::get('/', [ExperienceController::class, 'index'])->name('experience.index');
            Route::post('/', [ExperienceController::class, 'store'])->name('experience.store');
            // Route::get('/{experience}', [ExperienceController::class, 'show'])->name('experience.show');
            Route::put('/{experience}', [ExperienceController::class, 'update'])->name('experience.update');
            Route::delete('/{experience}', [ExperienceController::class, 'destroy'])->name('experience.destroy');
        });
    });
});
