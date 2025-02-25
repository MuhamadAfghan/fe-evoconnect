<?php

use App\Http\Controllers\MessagesController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', [MessagesController::class, 'index'])->name('messages.index');
    Route::get('/{user_id}', [MessagesController::class, 'show'])->name('messages.show');
    Route::post('/{message}', [MessagesController::class, 'store'])->name('messages.store');
    Route::delete('/{message}', [MessagesController::class, 'destroy'])->name('messages.destroy');
});
