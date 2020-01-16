<?php

use App\Http\Controllers\Backend\FlashController;

use App\Models\Flash;

Route::bind('flash', function ($value) {
	$flash = new Flash;

	return Flash::withTrashed()->where($flash->getRouteKeyName(), $value)->first();
});

Route::group(['prefix' => 'flashs'], function () {
	Route::get(	'', 		[FlashController::class, 'index']		)->name('flashs.index');
    Route::get(	'create', 	[FlashController::class, 'create']	)->name('flashs.create');
	Route::post('store', 	[FlashController::class, 'store']		)->name('flashs.store');
    Route::get(	'deleted', 	[FlashController::class, 'deleted']	)->name('flashs.deleted');
});

Route::group(['prefix' => 'flashs/{flash}'], function () {
	// Flash
	Route::get('/', [FlashController::class, 'show'])->name('flashs.show');
	Route::get('edit', [FlashController::class, 'edit'])->name('flashs.edit');
	Route::patch('update', [FlashController::class, 'update'])->name('flashs.update');
	Route::delete('destroy', [FlashController::class, 'destroy'])->name('flashs.destroy');
	// Deleted
	Route::get('restore', [FlashController::class, 'restore'])->name('flashs.restore');
	Route::get('delete', [FlashController::class, 'delete'])->name('flashs.delete-permanently');
});