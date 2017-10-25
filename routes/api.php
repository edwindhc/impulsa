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

// Test
Route::get('test', 'TestController@index');
Route::get('test/{id}', 'TestController@show');

// Questions
Route::get('question', 'QuestionController@index');
Route::get('question/{id}', 'QuestionController@show');

// Answer
Route::get('answer', 'AnswerController@index');
Route::get('answer/{id}', 'AnswerController@show');

//
Route::post('authenticate', [
	'uses' => 'CategoryController@authenticate']);

Route::post('/register',[
	'uses' => 'CategoryController@register']);
