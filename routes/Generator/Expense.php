<?php
/**
 * Expenses
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Expenses'], function () {
        Route::resource('expenses', 'ExpensesController');
        //For Datatable
        Route::post('expenses/get', 'ExpensesTableController')->name('expenses.get');
    });
    
});