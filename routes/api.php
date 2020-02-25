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


Route::get('books', 'BookController@index');
Route::delete('delete_book/{id}', 'BookController@delete');
Route::post('add_book', 'BookController@add');
Route::get('edit_book/{id}', 'BookController@edit');
Route::post('update_book/{id}', 'BookController@update');
Route::post('update_all', 'BookController@update_all');
