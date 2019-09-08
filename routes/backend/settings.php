<?php

use App\Http\Controllers\Backend\SettingController;

use App\Models\Setting;

Route::bind('setting', function ($value) {
	$setting = new Setting;

	return Setting::withTrashed()->where($setting->getRouteKeyName(), $value)->first();
});

Route::group(['prefix' => 'settings'], function () {
	Route::get(	'', 		[SettingController::class, 'index']		)->name('settings.index');
    Route::get(	'create', 	[SettingController::class, 'create']	)->name('settings.create');
	Route::post('store', 	[SettingController::class, 'store']		)->name('settings.store');
    Route::get(	'deleted', 	[SettingController::class, 'deleted']	)->name('settings.deleted');
});

Route::group(['prefix' => 'settings/{setting}'], function () {
	// Setting
	Route::get('/', [SettingController::class, 'show'])->name('settings.show');
	Route::get('edit', [SettingController::class, 'edit'])->name('settings.edit');
	Route::patch('update', [SettingController::class, 'update'])->name('settings.update');
	Route::delete('destroy', [SettingController::class, 'destroy'])->name('settings.destroy');
	// Deleted
	Route::get('restore', [SettingController::class, 'restore'])->name('settings.restore');
	Route::get('delete', [SettingController::class, 'delete'])->name('settings.delete-permanently');
});