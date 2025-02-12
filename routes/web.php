<?php

use App\Http\Controllers\ConnectController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/main-routes/auth.php';
require __DIR__ . '/main-routes/guest.php';
require __DIR__ . '/main-routes/api.php';

    // 🔹 Halaman Statis
    Route::get('/faq', [ConnectController::class, 'faq'])->name('faq');
    Route::get('/privacy', [ConnectController::class, 'privacy'])->name('privacy');
    Route::get('/terms', [ConnectController::class, 'terms'])->name('terms.term');