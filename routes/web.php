<?php

Route::get('admin/plans/create', 'Admin\PlanController@create')->name('plans.create');
Route::any('admin/plans/search', 'Admin\PlanController@search')->name('plans.search');
Route::delete('admin/plans/{url}', 'Admin\PlanController@destory')->name('plans.destroy');
Route::get('admin/plans/{url}', 'Admin\PlanController@show')->name('plans.show');
Route::post('admin/plans', 'Admin\PlanController@store')->name('plans.store');
Route::get('admin/plans', 'Admin\PlanController@index')->name('plans.index');

Route::get('/', function () {
    return view('welcome');
});
