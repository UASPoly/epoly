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

Route::prefix('staff')
->name('staff.')
->prefix('staff')
->group(function() {
	//authentication routes 
    Route::get('/', 'StaffController@verify');
	Route::get('/dashboard', 'StaffController@index')->name('dashboard');
	Route::get('/login', 'Auth\StaffLoginController@showLoginForm')->name('auth.login');
	Route::get('/unauthorize-staff', 'Auth\StaffLoginController@unauthorize')->name('auth.unauthorize');
	Route::post('/login', 'Auth\StaffLoginController@login')->name('login');
	Route::post('logout', 'Auth\StaffLoginController@logout')->name('auth.logout');
});
