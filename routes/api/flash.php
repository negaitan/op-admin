<?php

use App\Http\Controllers\Api\FlashController;

/**
 * All route are prefixed with '/api'.
 */

// /api/flashs
Route::get('flashs', [FlashController::class, 'index'])->name('flashs.index');
Route::get('flashs/{flash}', [FlashController::class, 'show'])->name('flashs.show');
