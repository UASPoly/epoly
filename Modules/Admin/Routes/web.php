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

Route::prefix('admin')->group(function() {
  Route::get('/', 'AdminController@verify')->name('admin');
  Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.auth.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login');
  Route::post('logout', 'Auth\AdminLoginController@logout')->name('admin.auth.logout');
   
  Route::prefix('calender')
    ->namespace('Calender')
    ->name('admin.calender.')
    ->group(function() {
    Route::get('/create', 'CalenderController@createCalender')->name('create');
    Route::post('/register', 'CalenderController@registerCalender')->name('register');
    Route::post('/calender/{calender_id}/update', 'CalenderController@updateCalender')->name('update');
    Route::get('/session/{session_id}/edit', 'CalenderController@editCalender')->name('edit');
    Route::get('/calender/{calender_id}/delete', 'CalenderController@deleteCalender')->name('delete');
    }); 
  //appointment routes
  Route::prefix('college')
    ->namespace('Appointment')
    ->name('admin.college.')
    ->group(function() {
  	Route::get('/manage/appointment/staff/display', 'AppointmentController@displayStaff')->name('appointment.manage.display.staff');
  	Route::get('/manage/appointment', 'AppointmentController@index')->name('appointment.manage.index');
  	Route::post('/manage/appointment/search', 'AppointmentController@searchStaff')->name('appointment.manage.search');

  	//department hod appointment routes
  	Route::get('/department/staff/{staff_id}/appointment/head-of-department/create', 'DepartmentalAppointmentController@createHeadOfDepartment')->name('department.appointment.hod.create');
  	Route::post('/department/appointment/hod/register', 'DepartmentalAppointmentController@registerHeadOfDepartment')->name('department.appointment.hod.register');

  	//college directer appointment routes
  	Route::get('/directer/staff/{staff_id}/appointment/create', 'CollegeAppointmentController@createCollegeDirecter')->name('appointment.directer.create');
  	Route::post('/directer/appointment/register', 'CollegeAppointmentController@registerCollegeDirecter')->name('appointment.directer.register');
    });

  //college route group
  Route::prefix('college')
    ->namespace('College')
    ->name('admin.college.')
    ->group(function() {
    Route::prefix('{collegeId}/management')
        ->name('management.')
        ->group(function() {
          Route::get('/', 'CollegeManagementController@index')->name('index');
        });  
  	Route::get('/', 'CollegeController@index')->name('index');

  	Route::get('/create-college', 'CollegeController@create')->name('create');
  	Route::post('/register-college', 'CollegeController@register')->name('register');
  	Route::post('/{college}/{college_id}/update-college', 'CollegeController@update')->name('update');
  	Route::get('/{college}/{college_id}/show-college', 'CollegeController@edit')->name('edit');
  	Route::get('/{college}/{college_id}/delete-college', 'CollegeController@delete')->name('delete');

	  	//department route group
		Route::prefix('department')
		    ->namespace('Department')
		    ->name('department.')
		    ->group(function() {
		  	Route::get('/', 'DepartmentController@index')->name('index');
		  	Route::get('/{collegeId}/create', 'DepartmentController@create')->name('create');
		  	Route::post('/register-department', 'DepartmentController@register')->name('register');
		  	Route::post('/{department}/{department_id}/update-department', 'DepartmentController@update')->name('update');
		  	Route::get('/{department}/{department_id}/edit-department', 'DepartmentController@edit')->name('edit');
		  	Route::get('/{department}/{department_id}/delete-department', 'DepartmentController@delete')->name('delete');
		  //department management routes  
      Route::prefix('{department}/{department_id}/management')
        ->namespace('Management')
        ->name('management.')
        ->group(function() {
        Route::get('/', 'ManagementController@index')->name('index');

        Route::prefix('programme')
        ->name('programme.')
        ->group(function() {
        Route::get('/', 'ProgrammeController@index')->name('index');
        Route::post('/register', 'ProgrammeController@register')->name('register');
        Route::post('/{departmentProgrammId}/update', 'ProgrammeController@update')->name('update');
        Route::get('/{departmentProgrammId}/de-activate', 'ProgrammeController@deActivate')->name('deactivate');
        Route::get('/{departmentProgrammId}/activate', 'ProgrammeController@activate')->name('activate');
        Route::get('/{departmentProgrammId}/delete', 'ProgrammeController@delete')->name('delete');
      });

       Route::prefix('course')
        ->name('course.')
        ->group(function() {
          Route::get('/', 'CourseManagementController@index')->name('index');
          Route::post('/{courseId}/update', 'CourseManagementController@update')->name('update');
          Route::get('/{courseId}/delete', 'CourseManagementController@delete')->name('delete');
          Route::post('/register', 'CourseManagementController@register')->name('register');
        });
      });
		    //staff route group
			Route::prefix('staff')
			    ->namespace('Staff')
			    ->name('staff.')
			    ->group(function() {
			  	Route::get('/', 'StaffController@index')->name('index');
			  	Route::get('/create-staff', 'StaffController@create')->name('create');
			  	Route::post('/register-staff', 'StaffController@register')->name('register');
			  	Route::post('/search-staff', 'StaffController@search')->name('search');
			  	Route::post('/{staff_id}/update-staff', 'StaffController@update')->name('update');
			  	Route::get('/{staff_id}/edit-staff', 'StaffController@edit')->name('edit');
			  	Route::get('/{staff_id}/delete-staff', 'StaffController@delete')->name('delete');
			  	Route::get('/{staff_id}/show-staff', 'StaffController@show')->name('show');
			  	Route::get('/staff-found', 'StaffController@staff')->name('staff');
			  	Route::get('/{staff_id}/register-complete', 'StaffController@registerComplete')->name('register.complete');
			  	Route::post('/{staff_id}/register-update', 'StaffController@registerUpdate')->name('register.update');
		    }); 
	    });
	});
   
});
