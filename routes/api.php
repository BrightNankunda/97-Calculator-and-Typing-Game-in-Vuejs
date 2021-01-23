<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('lasts', 'App\Http\Controllers\LastsController@index');
Route::post('lasts', 'App\Http\Controllers\LastsController@store');
Route::delete('lasts/{id}', 'App\Http\Controllers\LastsController@delete');

Route::get('profile', 'App\Http\Controllers\ProfileController@index');
Route::post('profile', 'App\Http\Controllers\ProfileController@store');
Route::get('index','App\Http\Controllers\TodoController@index');
Route::post('store', 'App\Http\Controllers\TodoController@store');
Route::patch('todos/{todo}', 'App\Http\Controllers\TodoController@update');
Route::delete('todos/{todo}', 'App\Http\Controllers\TodoController@delete');

Route::post('posts', 'App\Http\Controllers\PostController@store');
Route::get('posts', 'App\Http\Controllers\PostController@get');
Route::delete('posts/{id}', 'App\Http\Controllers\PostController@delete');
Route::get('show/{id}', 'App\Http\Controllers\PostController@show');
