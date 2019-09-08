<?php

use App\Http\Controllers\Backend\WebTextController;

use App\Models\WebText;

Route::bind('web_text', function ($value) {
	$web_text = new WebText;

	return WebText::withTrashed()->where($web_text->getRouteKeyName(), $value)->first();
});

Route::group(['prefix' => 'web_texts'], function () {
	Route::get(	'', 		[WebTextController::class, 'index']		)->name('web_texts.index');
    Route::get(	'create', 	[WebTextController::class, 'create']	)->name('web_texts.create');
	Route::post('store', 	[WebTextController::class, 'store']		)->name('web_texts.store');
    Route::get(	'deleted', 	[WebTextController::class, 'deleted']	)->name('web_texts.deleted');
});

Route::group(['prefix' => 'web_texts/{web_text}'], function () {
	// WebText
	Route::get('/', [WebTextController::class, 'show'])->name('web_texts.show');
	Route::get('edit', [WebTextController::class, 'edit'])->name('web_texts.edit');
	Route::patch('update', [WebTextController::class, 'update'])->name('web_texts.update');
	Route::delete('destroy', [WebTextController::class, 'destroy'])->name('web_texts.destroy');
	// Deleted
	Route::get('restore', [WebTextController::class, 'restore'])->name('web_texts.restore');
	Route::get('delete', [WebTextController::class, 'delete'])->name('web_texts.delete-permanently');
});