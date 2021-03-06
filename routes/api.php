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


// Route::prefix('v1')->group(function(){
//     Route::post('login', 'Api\AuthController@login');
//     Route::post('register', 'Api\AuthController@register');
//     Route::group(['middleware' => 'auth:api'], function(){
//     Route::post('getUser', 'Api\AuthController@getUser');
//     }); 
//    });

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::get('getContents/{slug}', 'API\UserController@getContent');
Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', 'API\UserController@details');
});
Route::post('logout','API\UserController@logoutApi');



Route::get('/category','Api\CategoryController@index');
Route::post('/category/store','Api\CategoryController@store');
Route::delete('/category/delete/{id}','Api\CategoryController@destroy');
Route::get('/Category/edit/{id}','Api\CategoryController@edit');
Route::put('/category/update/{id}','Api\CategoryController@update');
