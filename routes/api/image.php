<?php

use App\Http\Controllers\Api\ImageController;

/**
 * All route are prefixed with '/api'.
 */

// /api/images
Route::get('images', [ImageController::class, 'index'])->name('images.index');
Route::get('images/{image}', [ImageController::class, 'show'])->name('images.show');
