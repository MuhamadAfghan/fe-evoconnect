<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnectController;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\PostController;

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
    });
});
