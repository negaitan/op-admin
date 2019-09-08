<?php

use App\Http\Controllers\Backend\GymClassController;

use App\Models\GymClass;

Route::bind('gym_class', function ($value) {
	$gym_class = new GymClass;

	return GymClass::withTrashed()->where($gym_class->getRouteKeyName(), $value)->first();
});

Route::group(['prefix' => 'gym_classes'], function () {
	Route::get(	'', 		[GymClassController::class, 'index']		)->name('gym_classes.index');
    Route::get(	'create', 	[GymClassController::class, 'create']	)->name('gym_classes.create');
	Route::post('store', 	[GymClassController::class, 'store']		)->name('gym_classes.store');
    Route::get(	'deleted', 	[GymClassController::class, 'deleted']	)->name('gym_classes.deleted');
});

Route::group(['prefix' => 'gym_classes/{gym_class}'], function () {
	// GymClass
	Route::get('/', [GymClassController::class, 'show'])->name('gym_classes.show');
	Route::get('edit', [GymClassController::class, 'edit'])->name('gym_classes.edit');
	Route::patch('update', [GymClassController::class, 'update'])->name('gym_classes.update');
	Route::delete('destroy', [GymClassController::class, 'destroy'])->name('gym_classes.destroy');
	// Deleted
	Route::get('restore', [GymClassController::class, 'restore'])->name('gym_classes.restore');
	Route::get('delete', [GymClassController::class, 'delete'])->name('gym_classes.delete-permanently');
});