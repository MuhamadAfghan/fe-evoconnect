<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnectController;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::group(['prefix' => 'api', 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'blogs'], function () {
        Route::get('/', [BlogController::class, 'index']);
        Route::post('/', [BlogController::class, 'store']);
        Route::get('/{blog}', [BlogController::class, 'show']);
        Route::put('/{blog}', [BlogController::class, 'update']);
        Route::delete('/{blog}', [BlogController::class, 'destroy']);
    });

    //post
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', [PostController::class, 'index'])->name('posts.index');
        Route::post('/', [PostController::class, 'store'])->name('posts.store');
        Route::get('/{post}', [PostController::class, 'show'])->name('posts.show');
        Route::put('/{post}', [PostController::class, 'update'])->name('posts.update');
        Route::delete('/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
        //like
        Route::post('/{post}/like', [PostController::class, 'like'])->name('posts.like');
    });

    //user
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::post('/', [UserController::class, 'store'])->name('users.store');
        Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
        Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');

        //update social media
        Route::put('/{user}/social-media', [UserController::class, 'updateSocialMedia'])->name('users.update.social-media');
    });
});
