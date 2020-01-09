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

Route::prefix('college')
->name('college.')
->group(function() {
	Route::get('/', 'CollegeController@verify');
	Route::get('/directer', 'CollegeController@verify');
	Route::prefix('directer')
	->name('directer.')
	->group(function() {
		Route::get('/dashboard', 'CollegeController@index')->name('dashboard');
		Route::get('/login', 'Auth\CollegeLoginController@showLoginForm')->name('auth.login');
		Route::get('/directer/authentication/fail', 'Auth\CollegeLoginController@unauthorize')->name('auth.auth');
		Route::get('/unauthorize-directer', 'Auth\CollegeLoginController@unauthorize')->name('auth.unauthorize');
		Route::post('/login', 'Auth\CollegeLoginController@login')->name('login');
		Route::post('logout', 'Auth\CollegeLoginController@logout')->name('auth.logout');
	});  
});
