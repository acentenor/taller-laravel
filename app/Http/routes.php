<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'TodosController@index');
Route::get('todos/create','TodosController@create');
Route::post('todos/store','TodosController@store');
Route::get('todos/{id}/edit','TodosController@edit');
Route::put('todos/{id}/update','TodosController@update');
Route::delete('todos/destroy/{id}','TodosController@destroy');

Route::get('todos/{id}', 'TodosController@show');
Route::model('id','App\Todo');


Route::resource('comments','CommentsController');
