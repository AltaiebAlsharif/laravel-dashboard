<?php
/**
 * Building
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Building'], function () {
        Route::resource('buildings', 'BuildingsController');
        //For Datatable
        Route::post('buildings/get', 'BuildingsTableController')->name('buildings.get');
    });
    
});