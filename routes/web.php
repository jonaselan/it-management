<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteSystemProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/clients', 'ClientController@index');

Route::prefix('admin')->group(function (){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('', 'AdminController@index')->name('admin.dashboard');
});


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

Route::group(['prefix'=>'systems', 'where'=>['id'=>'[0-9]+']], function() {
    Route::get('', 'SystemController@index');
    Route::get('{id}', 'SystemController@show');
    Route::get('{id}/edit','SystemController@edit');
    Route::put('{id}','SystemController@update')->name('systems.update');;
    Route::get('create', 'SystemController@create');
    Route::post('', 'SystemController@store');
    Route::get('delete/{id}', 'SystemController@destroy');
});