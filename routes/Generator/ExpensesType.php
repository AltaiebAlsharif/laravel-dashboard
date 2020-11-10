<?php
/**
 * ExpensesType
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'ExpensesType'], function () {
        Route::resource('expensestypes', 'ExpensesTypesController');
        //For Datatable
        Route::post('expensestypes/get', 'ExpensesTypesTableController')->name('expensestypes.get');
    });
    
});