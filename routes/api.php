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

Route::get('gadget', 'App\Http\Controllers\GadgetsController@index');
Route::post('gadget', 'App\Http\Controllers\GadgetsController@store');
Route::delete('gadget/{id}', 'App\Http\Controllers\GadgetsController@delete');
Route::post('gadgetRestore/{id}', 'App\Http\Controllers\GadgetsController@restore');
Route::post('gadgetRestoreAll', 'App\Http\Controllers\GadgetsController@restoreAll');
Route::get('gadgetGetTrashed', 'App\Http\Controllers\GadgetsController@getTrashed');
Route::get('gadgetGetAll', 'App\Http\Controllers\GadgetsController@getAll');
Route::delete('gadgetForceDeleteAll', 'App\Http\Controllers\GadgetsController@forceDeleteAll');
Route::delete('gadgetForceDelete/{id}', 'App\Http\Controllers\GadgetsController@forceDelete');

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


Route::get('articles', 'App\Http\Controllers\ArticleController@index');
Route::post('articles', 'App\Http\Controllers\ArticleController@store');
Route::get('article/{id}', 'App\Http\Controllers\ArticleController@show');
Route::put('article/{id}', 'App\Http\Controllers\ArticleController@update');
Route::delete('article/{id}', 'App\Http\Controllers\ArticleController@delete');