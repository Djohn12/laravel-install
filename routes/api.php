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


Route::post('boards/store', 'BoardController@store');

Route::post('categories/store', 'CategoryController@index');

// Route::resource('/boards', 'BoardsController',[
// 	'except' => ['index', 'create', 'show', 'edit', 'update', 'destroy']
// ]);
