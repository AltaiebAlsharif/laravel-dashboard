<?php
/**
 * Owner
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Owner'], function () {
        Route::resource('owners', 'OwnersController');
        //For Datatable
        Route::post('owners/get', 'OwnersTableController')->name('owners.get');
    });
    
});