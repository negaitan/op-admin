<?php

use App\Http\Controllers\Api\WebTextController;

/**
 * All route are prefixed with '/api'.
 */

// /api/web_texts
Route::get('web-texts', [WebTextController::class, 'index'])->name('web_texts.index');
// Route::get('web-texts/{web_text}', [WebTextController::class, 'show'])->name('web_texts.show');
