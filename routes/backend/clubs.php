<?php

use App\Http\Controllers\Backend\ClubController;

use App\Models\Club;

Route::bind('club', function ($value) {
	$club = new Club;

	return Club::withTrashed()->where($club->getRouteKeyName(), $value)->first();
});

Route::group(['prefix' => 'clubs'], function () {
	Route::get(	'', 		[ClubController::class, 'index']		)->name('clubs.index');
    Route::get(	'create', 	[ClubController::class, 'create']	)->name('clubs.create');
	Route::post('store', 	[ClubController::class, 'store']		)->name('clubs.store');
    Route::get(	'deleted', 	[ClubController::class, 'deleted']	)->name('clubs.deleted');
});

Route::group(['prefix' => 'clubs/{club}'], function () {
	// Club
	Route::get('/', [ClubController::class, 'show'])->name('clubs.show');
	Route::get('edit', [ClubController::class, 'edit'])->name('clubs.edit');
	Route::patch('update', [ClubController::class, 'update'])->name('clubs.update');
	Route::delete('destroy', [ClubController::class, 'destroy'])->name('clubs.destroy');
	// Deleted
	Route::get('restore', [ClubController::class, 'restore'])->name('clubs.restore');
	Route::get('delete', [ClubController::class, 'delete'])->name('clubs.delete-permanently');
});