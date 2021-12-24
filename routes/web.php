<?php

Route::prefix('admin')
        ->namespace('Admin')
        ->middleware('auth')
        ->group(function () {
            /*
             * Permission x Profile
             */
            Route::any('profiles/{id}/permissions/create', 'ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
            Route::get('profiles/{id}/permission/{idPermission}/detach', 'ACL\PermissionProfileController@detachPermissionsProfile')->name('profiles.permission.detach');
            Route::post('profiles/{id}/permissions', 'ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');
            Route::get('profiles/{id}/permissions', 'ACL\PermissionProfileController@index')->name('profiles.permissions');
            Route::get('permissions/{id}/profile', 'ACL\PermissionProfileController@profiles')->name('permissions.profiles');

            /*
             * Permissions Routes
             */
            Route::any('roles/search', 'ACL\RoleController@search')->name('roles.search');
            Route::resource('roles', 'ACL\RoleController');

            /*
             * Products Routes
             */
            Route::any('tenants/search', 'TenantController@search')->name('tenants.search');
            Route::resource('tenants', 'TenantController');
            
            /*
             * Tables Routes
             */
            Route::any('tables/search', 'TableController@search')->name('tables.search');
            Route::resource('tables', 'TableController');

            /*
             * Products x Categories
             */
            Route::get('products/{id}/category/{idPermission}/detach', 'ProductCategoryController@detachCategoriesProduct')->name('products.categories.detach');
            Route::post('products/{id}/categories', 'ProductCategoryController@attachCategoriesProduct')->name('products.categories.attach');
            Route::any('products/{id}/categories/create', 'ProductCategoryController@categoriesAvailable')->name('products.categories.available');
            Route::get('products/{id}/categories', 'ProductCategoryController@index')->name('products.categories');
            Route::get('categories/{id}/product', 'ProductCategoryController@products')->name('categories.products');

            /*
             * Products Routes
             */
            Route::any('products/search', 'ProductController@search')->name('products.search');
            Route::resource('products', 'ProductController');
            /*
             * Categories Routes
             */
            Route::any('categories/search', 'CategoryController@search')->name('categories.search');
            Route::resource('categories', 'CategoryController');
            
            /*
             * Users Routes
             */
            Route::any('users/search', 'UserController@search')->name('users.search');
            Route::resource('users', 'UserController');

            /*
             * Plan x Profiles
             */
            Route::get('plans/{id}/profile/{idProfile}/detach', 'ACL\PlanProfileController@detachProfilesPlan')->name('plans.profile.detach');
            Route::post('plans/{id}/profiles', 'ACL\PlanProfileController@attachProfilesPlan')->name('plans.profiles.attach');
            Route::any('plans/{id}/profiles/create', 'ACL\PlanProfileController@profilesAvailable')->name('plans.profiles.available');
            Route::get('plans/{id}/profiles', 'ACL\PlanProfileController@index')->name('plans.profiles');
            Route::get('profiles/{id}/plans', 'ACL\PlanProfileController@plans')->name('profiles.plans');

            /*
             * Permission x Profile
             */
            Route::any('profiles/{id}/permissions/create', 'ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
            Route::get('profiles/{id}/permission/{idPermission}/detach', 'ACL\PermissionProfileController@detachPermissionsProfile')->name('profiles.permission.detach');
            Route::post('profiles/{id}/permissions', 'ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');
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
            Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
            Route::get('plans/{url}/details/{idDetail}', 'DetailPlanController@show')->name('details.plan.show');
            Route::put('plans/{url}/details/{idDetail}', 'DetailPlanController@update')->name('details.plan.update');
            Route::get('plans/{url}/details/{idDetail}/edit', 'DetailPlanController@edit')->name('details.plan.edit');
            Route::post('plans/{url}/details', 'DetailPlanController@store')->name('details.plan.store');
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

/**
 * Site routes
 */
Route::get('/plan/{url}', 'Site\SiteController@plan')->name('plan.subscription');
Route::get('/', 'Site\SiteController@index')->name('site.home');

/**
 * Auth Routes
 */

Auth::routes();
