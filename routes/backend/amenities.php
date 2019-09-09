<?php

use App\Http\Controllers\Backend\AmenityController;

use App\Models\Amenity;

Route::bind('amenity', function ($value) {
	$amenity = new Amenity;

	return Amenity::withTrashed()->where($amenity->getRouteKeyName(), $value)->first();
});

Route::group(['prefix' => 'amenities'], function () {
	Route::get(	'', 		[AmenityController::class, 'index']		)->name('amenities.index');
    Route::get(	'create', 	[AmenityController::class, 'create']	)->name('amenities.create');
	Route::post('store', 	[AmenityController::class, 'store']		)->name('amenities.store');
    Route::get(	'deleted', 	[AmenityController::class, 'deleted']	)->name('amenities.deleted');
});

Route::group(['prefix' => 'amenities/{amenity}'], function () {
	// Amenity
	Route::get('/', [AmenityController::class, 'show'])->name('amenities.show');
	Route::get('edit', [AmenityController::class, 'edit'])->name('amenities.edit');
	Route::patch('update', [AmenityController::class, 'update'])->name('amenities.update');
	Route::delete('destroy', [AmenityController::class, 'destroy'])->name('amenities.destroy');
	// Deleted
	Route::get('restore', [AmenityController::class, 'restore'])->name('amenities.restore');
	Route::get('delete', [AmenityController::class, 'delete'])->name('amenities.delete-permanently');
});