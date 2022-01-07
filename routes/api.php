<?php
/**
 * Tenants
 */
Route::get('/tenants/{uuid}', 'Api\TenantApiController@show');
Route::get('/tenants', 'Api\TenantApiController@index');

/**
 * Categories of tenant
 */
Route::get('/categories/{url}', 'Api\CategoryApiController@show');
Route::get('/categories', 'Api\CategoryApiController@categoriesByTenant');

/**
 * Categories of tenant
 */
Route::get('/tables/{id}', 'Api\TableApiController@show');
Route::get('/tables', 'Api\TableApiController@tablesByTenant');

/**
 * Products of tenant
 */
Route::get('/products/{flag}', 'Api\ProductApiController@show');
Route::get('/products', 'Api\ProductApiController@productsByTenant');
