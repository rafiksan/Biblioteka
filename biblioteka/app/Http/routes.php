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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/',['as'=>'home', 'uses'=>'libraryController@index']);
Route::get('edit/{id}', ['as'=>'edit', 'uses'=>'libraryController@edit']);
Route::get('create',['as'=>'create', 'uses'=> 'libraryController@create']);
Route::post('store', ['as'=>'store', 'uses'=>'libraryController@store']);
Route::post('delete/{id}', ['as'=>'delete', 'uses'=> 'libraryController@destroy']);
Route::post('update/{id}', ['as'=>'update', 'uses'=>'libraryController@update']);
