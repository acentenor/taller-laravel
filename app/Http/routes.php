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
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::group(['middleware' => 'auth'], function(){
  Route::get('auth/logout', 'Auth\AuthController@getLogout');

  //Route::get('/',['middleware' => 'auth', 'use' => 'TodosController@index']);
  Route::get('/', 'TodosController@index');
  Route::get('todos/create','TodosController@create');
  Route::post('todos/store','TodosController@store');
  Route::get('todos/{id}/edit',['middleware' => 'App\Http\Middleware\OfficeTime',
              'uses' => 'TodosController@edit']);
  Route::put('todos/{id}/update','TodosController@update');
  Route::delete('todos/destroy/{id}','TodosController@destroy');

  Route::get('todos/{id}', 'TodosController@show');
  Route::model('id','App\Todo');

  Route::resource('comments','CommentsController');
});
