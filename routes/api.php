<?php

Route::post('/sanctum/token', 'Api\Auth\AuthClientController@auth');

Route::group([
    'middleware' => ['auth:sanctum']
], function () {
    Route::get('/auth/me', 'Api\Auth\AuthClientController@me');
    Route::post('/auth/logout', 'Api\Auth\AuthClientController@logout');
    
    Route::post('/auth/v1/orders', 'Api\OrderApiController@store');
    Route::get('/auth/v1/my-orders', 'Api\OrderApiController@myOrders');

    Route::post('/auth/v1/orders/{identify}/evaluations', 'Api\EvaluationApiController@store');
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
    Route::get('/categories/{identify}', 'CategoryApiController@show');
    Route::get('/categories', 'CategoryApiController@categoriesByTenant');
    
    /**
     * Categories of tenant
     */
    Route::get('/tables/{identify}', 'TableApiController@show');
    Route::get('/tables', 'TableApiController@tablesByTenant');
    
    /**
     * Products of tenant
     */
    Route::get('/products/{identify}', 'ProductApiController@show');
    Route::get('/products', 'ProductApiController@productsByTenant');
    
    
    Route::post('/client', 'Auth\RegisterController@store');

    Route::post('/orders', 'OrderApiController@store');
    Route::post('/orders/{identify}', 'OrderApiController@show');
});
