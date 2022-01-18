<?php

Route::post('/sanctum/token', 'Api\Auth\AuthClientController@auth');

Route::group([
    'middleware' => ['auth:sanctum']
], function () {
    Route::get('/auth/me', 'Api\Auth\AuthClientController@me');
    Route::post('/auth/logout', 'Api\Auth\AuthClientController@logout');
});

/**
 * Version 1
 */
Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api'
], function () {
    /**
     * Tenants
     */
    Route::get('/tenants/{uuid}', 'TenantApiController@show');
    Route::get('/tenants', 'TenantApiController@index');
    
    /**
     * Categories of tenant
     */
    Route::get('/categories/{url}', 'CategoryApiController@show');
    Route::get('/categories', 'CategoryApiController@categoriesByTenant');
    
    /**
     * Categories of tenant
     */
    Route::get('/tables/{id}', 'TableApiController@show');
    Route::get('/tables', 'TableApiController@tablesByTenant');
    
    /**
     * Products of tenant
     */
    Route::get('/products/{flag}', 'ProductApiController@show');
    Route::get('/products', 'ProductApiController@productsByTenant');
    
    
    Route::post('/client', 'Auth\RegisterController@store');
});
