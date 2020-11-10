<?php
/**
 * BuildingUnits
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'BuildingUnits'], function () {
        Route::resource('buildingunits', 'BuildingUnitsController');
        //For Datatable
        Route::post('buildingunits/get', 'BuildingUnitsTableController')->name('buildingunits.get');
    });
    
});