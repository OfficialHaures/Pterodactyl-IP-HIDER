Route::group(['prefix' => 'activity'], function () {
    Route::get('/', [ActivityLogController::class, 'index'])->name('admin.activity');
});
