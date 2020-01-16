<?php

use App\Http\Controllers\Api\ClassNameController;

/**
 * All route are prefixed with '/api'.
 */

// /api/class_names
Route::get('class-names', [ClassNameController::class, 'index'])->name('class_names.index');
// Route::get('class-names/{class_name}', [ClassNameController::class, 'show'])->name('class_names.show');
