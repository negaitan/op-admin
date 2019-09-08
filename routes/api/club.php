<?php

use App\Http\Controllers\Api\ClubController;

/**
 * All route are prefixed with '/api'.
 */

// /api/clubs
Route::get('clubs', [ClubController::class, 'index'])->name('clubs.index');
Route::get('clubs/{club}', [ClubController::class, 'show'])->name('clubs.show');
