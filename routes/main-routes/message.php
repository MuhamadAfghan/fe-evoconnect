<?php

use App\Http\Controllers\MessagesController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', [MessagesController::class, 'index'])->name('messages.index');
    // Route::get('/{user_id}', [MessagesController::class, 'show'])->name('messages.show');
    Route::get('/chat/user/{user}', [App\Http\Controllers\ChatController::class, 'chat'])->name('messages.show');
    Route::get('/chat/room/{room}', [App\Http\Controllers\ChatController::class, 'room'])->name('messages.room');
    Route::get('/chat/get/{room}', [App\Http\Controllers\ChatController::class, 'getChat'])->name('messages.chat.get');
    Route::post('/chat/send', [App\Http\Controllers\ChatController::class, 'sendChat'])->name('messages.chat.send');
    Route::post('/{message}', [MessagesController::class, 'store'])->name('messages.store');
    Route::delete('/{message}', [MessagesController::class, 'destroy'])->name('messages.destroy');
});


Route::group(['prefix' => 'api/messages'], function () {
    Route::get('/chat/{room}', [App\Http\Controllers\ChatController::class, 'getChat'])->name('messages.chat.get');
    Route::post('/chat/send', [App\Http\Controllers\ChatController::class, 'sendChat'])->name('messages.chat.send');
});
