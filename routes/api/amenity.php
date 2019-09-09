<?php

use App\Http\Controllers\Api\AmenityController;

/**
 * All route are prefixed with '/api'.
 */

// /api/amenities
Route::get('amenities', [AmenityController::class, 'index'])->name('amenities.index');
Route::get('amenities/{amenity}', [AmenityController::class, 'show'])->name('amenities.show');