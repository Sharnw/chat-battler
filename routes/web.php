<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/home');

Auth::routes();

// request a new API token
Route::post('token/update', 'ApiTokenController@update');

Route::group(['middleware' => ['auth']], function () {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('images', 'ImageController');
	Route::resource('sources', 'SourceController');
	Route::resource('games', 'GameController');
	Route::resource('characters', 'CharacterController');
	Route::resource('items', 'ItemController');
	Route::resource('battles', 'BattleController');
});
