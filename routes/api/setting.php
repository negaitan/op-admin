<?php

use App\Http\Controllers\Api\SettingController;

/**
 * All route are prefixed with '/api'.
 */

// /api/settings
Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
Route::get('settings/{setting}', [SettingController::class, 'show'])->name('settings.show');
