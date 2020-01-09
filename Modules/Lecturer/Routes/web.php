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

Route::prefix('lecturer')
->name('lecturer.')
->group(function() {
    Route::get('/', 'LecturerController@verify')->name('verify');
    Route::get('/dashboard', 'LecturerController@index')->name('dashboard');
    Route::get('/login', 'Auth\LecturerLoginController@showLoginForm')->name('auth.login');
    Route::post('/login', 'Auth\LecturerLoginController@login')->name('login');
    Route::post('logout', 'Auth\LecturerLoginController@logout')->name('auth.logout');

    Route::prefix('courses')
    ->name('courses.')
    ->namespace('Course')
    ->group(function() {

    Route::prefix('result/statistics')
        ->name('results.statistics.')
        ->group(function() {
        Route::get('/', 'ResultChartController@index')->name('index');
        Route::post('/chart/search', 'ResultChartController@search')->name('chart.search');
        Route::get('/chart/view', 'ResultChartController@view')->name('chart.view');
    });

        Route::get('/', 'CourseController@index')->name('index');
        Route::prefix('students')
        ->name('students.')
        ->group(function() {
            Route::get('/', 'CourseStudentController@index')->name('index');
            Route::post('/search', 'CourseStudentController@search')->name('search');
            Route::get('/registered', 'CourseStudentController@registeredStudents')->name('registered');
            Route::get('/available', 'CourseStudentController@availableStudents')->name('available');
        });
    });

    Route::prefix('result')
	->name('result.')
	->namespace('Result')
	->group(function() {

        Route::get('/', 'ResultController@index')->name('index');
        Route::get('/show', 'ResultController@showResult')->name('show');
        Route::post('/search', 'ResultController@searchResult')->name('search');

        Route::prefix('templete')
        ->name('templete.')
        ->group(function() {
            Route::get('/', 'ResultTempleteController@index')->name('index');
            Route::post('/download', 'ResultTempleteController@downloadTemplete')->name('download');
        });

        Route::prefix('upload')
        ->name('upload.')
        ->group(function() {
            Route::get('/', 'ResultUploadController@index')->name('index');
            Route::post('/upload', 'ResultUploadController@upload')->name('upload');
        });
	});
});
