<?php

use App\Http\Controllers\Api\ClassGroupController;

/**
 * All route are prefixed with '/api'.
 */

// /api/class_groups
Route::get('class_groups', [ClassGroupController::class, 'index'])->name('class_groups.index');
Route::get('class_groups/{class_group}', [ClassGroupController::class, 'show'])->name('class_groups.show');
