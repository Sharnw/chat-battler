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

Route::group(['middleware' => ['auth', 'role:player']], function () {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('images', 'ImageController');
	Route::resource('sources', 'SourceController');
	Route::resource('games', 'GameController');
	Route::resource('characters', 'CharacterController');
	Route::resource('items', 'ItemController');
	Route::resource('battles', 'BattleController');
});
