<?php

use App\Http\Controllers\Api\PlanController;

/**
 * All route are prefixed with '/api'.
 */

// /api/plans
Route::get('plans', [PlanController::class, 'index'])->name('plans.index');
Route::get('plans/{plan}', [PlanController::class, 'show'])->name('plans.show');
