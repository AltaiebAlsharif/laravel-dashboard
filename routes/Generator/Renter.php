<?php
/**
 * Renter
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Renter'], function () {
        Route::resource('renters', 'RentersController');
        //For Datatable
        Route::post('renters/get', 'RentersTableController')->name('renters.get');
    });
    
});