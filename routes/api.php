<?php

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
});
