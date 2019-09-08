<?php

use App\Http\Controllers\Api\SettingController;

/**
 * All route are prefixed with '/api'.
 */

// /api/home
Route::get('home', [SettingController::class, 'index'])->name('home.index');
