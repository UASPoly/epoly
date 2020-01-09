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

Route::prefix('student')
->name('student.')
->group(function() {
    Route::get('/', 'StudentController@verify');
	Route::get('/dashboard', 'StudentController@index')->name('dashboard');
	Route::get('/login', 'Auth\StudentLoginController@showLoginForm')->name('auth.login');
	Route::get('/unauthorize-student', 'Auth\StudentLoginController@unauthorize')->name('auth.auth');
	Route::post('/login', 'Auth\StudentLoginController@login')->name('login');
	Route::post('logout', 'Auth\StudentLoginController@logout')->name('auth.logout');
   Route::get('/graduation/status/page','StudentGraduationController@graduation')->name('graduation.status.page');
   Route::get('/withdraw/status/page','StudentGraduationController@withDraw')->name('withdraw.status.page');
   //diferring routes
    Route::prefix('diferring')
	->name('diferring.')
	->namespace('Student')
	->group(function() {
	    Route::get('/', 'DiferringController@index')->name('index');
	    Route::post('/apply', 'DiferringController@apply')->name('apply');
        
	});
	Route::prefix('courses')
	->name('course.')
	->namespace('Course')
	->group(function() {

	    Route::get('registered/result/show', 'CourseRegistrationController@results')->name('results.show');
	    Route::get('registered/show', 'CourseRegistrationController@registeredCourses')->name('registered.show');
  
        Route::prefix('registration')
		->name('registration.')
		->group(function() {
			//course registration routes
	        Route::get('/', 'CourseRegistrationController@availableCourses')->name('courses');
	        Route::post('/register', 'CourseRegistrationController@registerCourses')->name('courses.register');
	        Route::get('/registered/show', 'CourseRegistrationController@showCourses')->name('courses.register.show');
            //add and drop course registration routes
	        Route::get('/add-or-drop-course', 'AddAndDropCourseController@showRegisredAndCarryOverCourses')->name('add.drop');
	        Route::post('/add-or-drop-course/register', 'AddAndDropCourseController@register')->name('add.drop.register');
		});
		
	});
});
