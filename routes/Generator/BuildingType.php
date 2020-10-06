<?php
/**
 * BuildingType
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'BuildingType'], function () {
        Route::resource('buildingtypes', 'BuildingTypesController');
        //For Datatable
        Route::post('buildingtypes/get', 'BuildingTypesTableController')->name('buildingtypes.get');
    });
    
});