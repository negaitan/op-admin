<?php

use App\Http\Controllers\Backend\ClassGroupController;

use App\Models\ClassGroup;

Route::bind('class_group', function ($value) {
	$class_group = new ClassGroup;

	return ClassGroup::withTrashed()->where($class_group->getRouteKeyName(), $value)->first();
});

Route::group(['prefix' => 'class_groups'], function () {
	Route::get(	'', 		[ClassGroupController::class, 'index']		)->name('class_groups.index');
    Route::get(	'create', 	[ClassGroupController::class, 'create']	)->name('class_groups.create');
	Route::post('store', 	[ClassGroupController::class, 'store']		)->name('class_groups.store');
    Route::get(	'deleted', 	[ClassGroupController::class, 'deleted']	)->name('class_groups.deleted');
});

Route::group(['prefix' => 'class_groups/{class_group}'], function () {
	// ClassGroup
	Route::get('/', [ClassGroupController::class, 'show'])->name('class_groups.show');
	Route::get('edit', [ClassGroupController::class, 'edit'])->name('class_groups.edit');
	Route::patch('update', [ClassGroupController::class, 'update'])->name('class_groups.update');
	Route::delete('destroy', [ClassGroupController::class, 'destroy'])->name('class_groups.destroy');
	// Deleted
	Route::get('restore', [ClassGroupController::class, 'restore'])->name('class_groups.restore');
	Route::get('delete', [ClassGroupController::class, 'delete'])->name('class_groups.delete-permanently');
});