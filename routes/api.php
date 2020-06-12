<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/parts', 'PartsController@index');
Route::post('/parts', 'PartsController@store');
//-----------------------------------------------------------//
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');
Route::get('open', 'DataController@open');
//--------------------------------------------------------//
Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'UserController@getAuthenticatedUser');
    Route::get('closed', 'DataController@closed');
    //---------------------------------------------------//
    Route::get('/products', 'ProductsController@index');
    Route::post('/products', 'ProductsController@store');
    Route::patch('/products/{products}', 'ProductsController@update')->name('products.update');
    Route::delete('/products/{products}', 'ProductsController@destroy')->name('products.destroy');
    //-----------------------------------------------------//
    Route::get('/permission', 'PermissionController@index');
    Route::post('/permission', 'PermissionController@store');
    Route::patch('/permission/{permission}', 'PermissionController@update');
    Route::delete('/permission/{permission}', 'PermissionController@delete');
    //-----------------------------------------------------//
    Route::get('/role', 'RoleController@index');
    Route::get('/role', 'RoleController@create');
    Route::get('/role', 'RoleController@store');
});
