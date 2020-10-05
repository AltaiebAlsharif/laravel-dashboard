<?php
/**
 * BuildingDetail
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'BuildingDetail'], function () {
        Route::resource('buildingdetails', 'BuildingDetailsController');
        //For Datatable
        Route::post('buildingdetails/get', 'BuildingDetailsTableController')->name('buildingdetails.get');
    });
    
});