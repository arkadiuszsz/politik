<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array(
	'before' => 'auth.basic.stateless',
	'uses' => 'HomeController@showWelcome')
);
Route::resource('sector', 'SectorController', array('only' => array('index', 'show')));
Route::resource('state', 'StateController', array('only' => array('index', 'show', 'update')));
Route::resource('user', 'UserController', array('only' => array('index', 'show')));
Route::post('/create-account/is-email-available', 'UserController@isEmailAvailable');
Route::post('/login', 'UserController@login');
Route::post('/logout', 'UserController@logout');
