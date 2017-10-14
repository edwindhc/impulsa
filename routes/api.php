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

Route::get('/name', function(Request $request){
	$token = JWTAuth::getToken();

	$user = JWTAuth::toUser($token);

	return $user;
})->middleware('jwt.auth');

Route::get('category', 'CategoryController@index');
Route::get('category/{id}', 'CategoryController@show');
Route::post('category', 'CategoryController@store');
Route::post('category/{id}', 'CategoryController@update');


//users
Route::get('users', 'UserController@index');
Route::get('user/{id}', 'UserController@show');
Route::post('user', 'UserController@store');
Route::put('user/{id}', 'UserController@update');
Route::delete('user/{id}', 'UserController@destroy');

//
Route::post('authenticate', [
	'uses' => 'CategoryController@authenticate']);

Route::post('/register',[
	'uses' => 'ApiAuthController@register']);
