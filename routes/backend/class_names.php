<?php

use App\Http\Controllers\Backend\ClassNameController;

use App\Models\ClassName;

Route::bind('class_name', function ($value) {
	$class_name = new ClassName;

	return ClassName::withTrashed()->where($class_name->getRouteKeyName(), $value)->first();
});

Route::group(['prefix' => 'class_names'], function () {
	Route::get(	'', 		[ClassNameController::class, 'index']		)->name('class_names.index');
    Route::get(	'create', 	[ClassNameController::class, 'create']	)->name('class_names.create');
	Route::post('store', 	[ClassNameController::class, 'store']		)->name('class_names.store');
    Route::get(	'deleted', 	[ClassNameController::class, 'deleted']	)->name('class_names.deleted');
});

Route::group(['prefix' => 'class_names/{class_name}'], function () {
	// ClassName
	Route::get('/', [ClassNameController::class, 'show'])->name('class_names.show');
	Route::get('edit', [ClassNameController::class, 'edit'])->name('class_names.edit');
	Route::patch('update', [ClassNameController::class, 'update'])->name('class_names.update');
	Route::delete('destroy', [ClassNameController::class, 'destroy'])->name('class_names.destroy');
	// Deleted
	Route::get('restore', [ClassNameController::class, 'restore'])->name('class_names.restore');
	Route::get('delete', [ClassNameController::class, 'delete'])->name('class_names.delete-permanently');
});