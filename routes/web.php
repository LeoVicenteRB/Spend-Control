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
Route::get('/', array('as'=>'home.index', 'uses'=>'HomeController@index'));
Route::get('/sair', array('as'=>'home.sair', 'uses'=>'HomeController@sair'));
Route::get('/registro', array('as'=>'home.create', 'uses'=>'UserController@create'));
Route::post('/criar/registro', array('as'=>'home.store', 'uses'=>'UserController@store'));

Route::group(['middleware'=>'auth'], function(){
	Route::get('/dashboard', array('as'=>'dashboard.index', 'uses'=>'DashboardController@index'));
	Route::get('/index', array('as'=>'index', 'uses'=>'DashboardController@index'));
	Route::get('/showcontas', array('as'=>'dashboard.show', 'uses'=>'DashboardController@show'));
	Route::get('/cadastro', array('as'=>'conta.create', 'uses'=>'ContasController@create'));
	Route::post('/cadastro','ContasController@store');
	Route::get('/dispesas', array('as'=>'dispesas.index', 'uses'=>'DispesasController@index'));
	Route::post('/dispesas','DispesasController@store');
	Route::get('/dispesas.showdisp', array('as'=>'dispesas.show', 'uses'=>'DispesasController@show'));
	Route::get('/extra', array('as'=>'extra.create', 'uses'=>'ExtraController@create'));
	Route::post('/extra','ExtraController@store');
	Route::get('/showextra', array('as'=>'extra.show', 'uses'=>'ExtraController@show'));
	Route::get('/edit.edit', array('as'=>'user.edit', 'uses'=>'UserController@edit'));
	Route::post('/edit.edit','UserController@update');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
