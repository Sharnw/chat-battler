<?php

use Illuminate\Http\Request;
use App\Http\Resources\Game as GameResource;
use App\Game;

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


Route::group(['middleware' => ['auth:api']], function () {
	Route::get('/user', function (Request $request) {
	    return $request->user();
	});

	// Route::get('/games/{id}', function (Request $request, Game $game) {
	//     return new GameResource($game);
	// });

	Route::get('/games/{game}/characters', function (Request $request, Game $game) {
        return response()->json([
            'characters' => $game->characters
        ], 200);
	});

	Route::get('/games/{game}/items', function (Request $request, Game $game) {
        return response()->json([
            'items' => $game->items
        ], 200);
	});
});

