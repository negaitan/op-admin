<?php

use App\Http\Controllers\Backend\PlanController;

use App\Models\Plan;

Route::bind('plan', function ($value) {
	$plan = new Plan;

	return Plan::withTrashed()->where($plan->getRouteKeyName(), $value)->first();
});

Route::group(['prefix' => 'plans'], function () {
	Route::get(	'', 		[PlanController::class, 'index']		)->name('plans.index');
    Route::get(	'create', 	[PlanController::class, 'create']	)->name('plans.create');
	Route::post('store', 	[PlanController::class, 'store']		)->name('plans.store');
    Route::get(	'deleted', 	[PlanController::class, 'deleted']	)->name('plans.deleted');
});

Route::group(['prefix' => 'plans/{plan}'], function () {
	// Plan
	Route::get('/', [PlanController::class, 'show'])->name('plans.show');
	Route::get('edit', [PlanController::class, 'edit'])->name('plans.edit');
	Route::patch('update', [PlanController::class, 'update'])->name('plans.update');
	Route::delete('destroy', [PlanController::class, 'destroy'])->name('plans.destroy');
	// Deleted
	Route::get('restore', [PlanController::class, 'restore'])->name('plans.restore');
	Route::get('delete', [PlanController::class, 'delete'])->name('plans.delete-permanently');
});