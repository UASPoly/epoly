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

Route::prefix('core')
   ->group(function() {
    //ajax route
    Route::prefix('ajax')
	   ->namespace('Ajax')
	   ->name('ajax')
	   ->group(function() {
        //address ajax routes
	    Route::prefix('address')
		   ->name('address')
		   ->group(function() {

	        Route::get('/state/{stateId}/get-lgas', 'AddressController@getLgas');

		});
		Route::prefix('programme')
		   ->name('address')
		   ->group(function() {

	        Route::get('/{programmeId}/get-programme-schedules', 'ProgrammeController@getProgrammeSchedules');

		});   
	});
});


