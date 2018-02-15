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

Route::get('/clients', 'ClientController@index');

Route::group(['prefix'=>'contracts', 'where'=>['id'=>'[0-9]+']], function() {
    Route::get('', 'ContractController@index');
    Route::get('{id}', 'ContractController@show');
    Route::get('{id}/edit','ContractController@edit');
    Route::put('{id}','ContractController@update')->name('contracts.update');;
    Route::get('create', 'ContractController@create');
    Route::post('', 'ContractController@store');
    Route::get('delete/{id}', 'ContractController@destroy');
});

Route::group(['prefix'=>'projects', 'where'=>['id'=>'[0-9]+']], function() {
    Route::get('', 'ProjectController@index');
    Route::get('{id}', 'ProjectController@show');
    Route::get('{id}/edit','ProjectController@edit');
    Route::put('{id}','ProjectController@update')->name('projects.update');;
    Route::get('create', 'ProjectController@create');
    Route::post('', 'ProjectController@store');
    Route::get('delete/{id}', 'ProjectController@destroy');
});

Auth::routes();
Route::get('/', 'HomeController@index');