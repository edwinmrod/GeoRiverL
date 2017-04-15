<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/homeD', 'HomeController@indexD');

Route::get('/homeE', 'HomeController@indexE');

Route::resource('travelsD', 'travelController');

Route::resource('activitiesD', 'activityController');

Route::resource('variablesD', 'variableController');

Route::resource('travels', 'travelController');
Route::resource('travelsE', 'registerTravelController');
Route::resource('travelsRegistered', 'travelRegisteredController');

Route::resource('activities', 'activityController');

Route::resource('variables', 'variableController');

Route::resource('users', 'userController');

Route::resource('perfil', 'perfilController');

Route::resource('locations', 'locationController');

Route::get('/travelsE.enroll ', 'travelController@enroll');