<?php

Route::prefix('admin')
        ->namespace('Admin')
        ->group(function () {
            /*
             * Permissions x Profiles
             */
            Route::get('profiles/{id}/permission/{idPermission}/detach', 'ACL\PermissionProfileController@detachPermissionsProfile')->name('profiles.permission.detach');
            Route::post('profiles/{id}/permissions', 'ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');
            Route::any('profiles/{id}/permissions/create', 'ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
            Route::get('profiles/{id}/permissions', 'ACL\PermissionProfileController@index')->name('profiles.permissions');
            Route::get('permissions/{id}/profile', 'ACL\PermissionProfileController@profiles')->name('permissions.profiles');

            /*
             * Permissions Routes
             */
            Route::any('permissions/search', 'ACL\PermissionController@search')->name('permission.search');
            Route::resource('permissions', 'ACL\PermissionController');

            /*
             * Profiles Routes
             */
            Route::any('profiles/search', 'ACL\ProfileController@search')->name('profiles.search');
            Route::resource('profiles', 'ACL\ProfileController');

            /*
             * Details Plan Routes
             */
            Route::delete('plans/{url}/details/{idDetail}', 'DetailPlanController@destroy')->name('details.plan.destroy');
            Route::get('plans/{url}/details/{idDetail}', 'DetailPlanController@show')->name('details.plan.show');
            Route::put('plans/{url}/details/{idDetail}', 'DetailPlanController@update')->name('details.plan.update');
            Route::get('plans/{url}/details/{idDetail}/edit', 'DetailPlanController@edit')->name('details.plan.edit');
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
