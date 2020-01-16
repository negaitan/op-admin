<?php

use App\Http\Controllers\Api\GymClassController;

/**
 * All route are prefixed with '/api'.
 */

// /api/gym_classes
Route::get('gym-classes', [GymClassController::class, 'index'])->name('gym_classes.index');
Route::get('gym-classes/{gym_class}', [GymClassController::class, 'show'])->name('gym_classes.show');
