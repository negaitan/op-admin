<?php

use App\Http\Controllers\Backend\ImageController;

use App\Models\Image;

Route::bind('image', function ($value) {
	$image = new Image;

	return Image::withTrashed()->where($image->getRouteKeyName(), $value)->first();
});

Route::group(['prefix' => 'images'], function () {
	Route::get(	'', 		[ImageController::class, 'index']		)->name('images.index');
    Route::get(	'create', 	[ImageController::class, 'create']	)->name('images.create');
	Route::post('store', 	[ImageController::class, 'store']		)->name('images.store');
    Route::get(	'deleted', 	[ImageController::class, 'deleted']	)->name('images.deleted');
});

Route::group(['prefix' => 'images/{image}'], function () {
	// Image
	Route::get('/', [ImageController::class, 'show'])->name('images.show');
	Route::get('edit', [ImageController::class, 'edit'])->name('images.edit');
	Route::patch('update', [ImageController::class, 'update'])->name('images.update');
	Route::delete('destroy', [ImageController::class, 'destroy'])->name('images.destroy');
	// Deleted
	Route::get('restore', [ImageController::class, 'restore'])->name('images.restore');
	Route::get('delete', [ImageController::class, 'delete'])->name('images.delete-permanently');
});