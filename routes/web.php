<?php

Route::prefix('admin')
        ->namespace('Admin')
        ->group(function () {
            /*
             * Details Plan Routes
             */
            Route::post('plans/{url}/details', 'DetailPlanController@store')->name('details.plan.store');
            Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
            Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plan.index');

            /*
             * Plans Routes
             */
            Route::put('plans/{url}', 'PlanController@update')->name('plans.update');
            Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
            Route::get('plans/create', 'PlanController@create')->name('plans.create');
            Route::any('plans/search', 'PlanController@search')->name('plans.search');
            Route::delete('plans/{url}', 'PlanController@destory')->name('plans.destroy');
            Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
            Route::post('plans', 'PlanController@store')->name('plans.store');
            Route::get('plans', 'PlanController@index')->name('plans.index');

            /*
             * Dashboard Route
             */
            Route::get('/', 'PlanController@index')->name('admin.index');
});


Route::get('/', function () {
    return view('welcome');
});
