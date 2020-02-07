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

Route::prefix('admin')
->name('admin.')
->group(function() {

  Route::prefix('states')
    ->namespace('State')
    ->name('state.')
    ->group(function() {
      Route::get('/', 'StateController@index')->name('index');
      Route::post('{stateId}/update', 'StateController@update')->name('update');
      Route::get('{stateId}/delete', 'StateController@delete')->name('delete');

      Route::prefix('{stateId}/lgas')
      ->namespace('Lga')
      ->name('lga.')
      ->group(function() {
        Route::get('/', 'LgaController@index')->name('index');
        Route::post('{lgaId}/update', 'LgaController@update')->name('update');
        Route::get('{lgaId}/delete', 'LgaController@delete')->name('delete');
      });
  });

  Route::get('/', 'AdminController@verify')->name('admin');
  Route::get('/dashboard', 'AdminController@index')->name('dashboard');
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('auth.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('login');
  Route::post('logout', 'Auth\AdminLoginController@logout')->name('auth.logout');
   
  Route::prefix('calender')
    ->namespace('Calender')
    ->name('calender.')
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
    ->name('college.')
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
    ->name('college.')
    ->group(function() {
  	Route::get('/', 'CollegeController@index')->name('index');
  	Route::get('/create', 'CollegeController@create')->name('create');
  	Route::post('/register', 'CollegeController@register')->name('register');
    Route::get('/{college_id}/edit', 'CollegeController@edit')->name('edit');
  	Route::post('/{college_id}/update', 'CollegeController@update')->name('update');
  	Route::get('/{college_id}/delete', 'CollegeController@delete')->name('delete');
    

    //college management routes
    Route::prefix('calendar/management')
      ->name('calendar.management.')
      ->namespace('Calendar\Management')
      ->group(function() {
        Route::get('/', 'CalendarManagementController@index')->name('index');
        Route::get('/view', 'CalendarManagementController@view')->name('view');
        Route::get('/generate', 'CalendarManagementController@generate')->name('generate');
        Route::post("/session/.currentSession()->id./update", 'CalendarManagementController@updateSession')->name('session.update');
    });

    //college management routes
    Route::prefix('{collegeId}/management')
      ->name('management.')
      ->group(function() {
        Route::get('/', 'CollegeManagementController@index')->name('index');
    }); 

	  //college department route group
		Route::prefix('department')
		    ->namespace('Department')
		    ->name('department.')
		    ->group(function() {
		  	Route::get('/{collegeId}', 'DepartmentController@index')->name('index');
		  	Route::get('/{collegeId}/create', 'DepartmentController@create')->name('create');
		  	Route::post('/register', 'DepartmentController@register')->name('register');
		  	Route::post('/{department_id}/update', 'DepartmentController@update')->name('update');
		  	Route::get('/{department_id}/edit', 'DepartmentController@edit')->name('edit');
		  	Route::get('/{department_id}/delete', 'DepartmentController@delete')->name('delete');

        //department lecturer appointment management routes
        Route::prefix('appointments')
          ->name('appointment.')
          ->group(function() {
            //head of department appointment routes
            Route::prefix('head-of-department')
            ->name('hod.')
            ->group(function() {
              Route::get('/lecturer/{lecturerId}', 'AppointmentController@createHeadOfDepartment')->name('create');

              Route::get('/lecturer/{lecturerId}/edit', 'AppointmentController@editHeadOfDepartment')->name('edit');

              Route::post('/lecturer/{lecturerId}/update', 'AppointmentController@updateHeadOfDepartment')->name('update');

              Route::get('/lecturer/{lecturerId}/revoke', 'AppointmentController@revokeHeadOfDepartment')->name('revoke');

              Route::get('/lecturer/{lecturerId}/delete', 'AppointmentController@deleteHeadOfDepartment')->name('delete');

              Route::post('/lecturer/{lecturerId}/register', 'AppointmentController@registerHeadOfDepartment')->name('register');
            });
            //other departmental appointment goes here
        });

		  //department management routes  
      Route::prefix('{department_id}/management')
        ->namespace('Management')
        ->name('management.')
        ->group(function() {
        Route::get('/', 'ManagementController@index')->name('index');

        //department programme management route
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

        //department course management route
        Route::prefix('course')
        ->name('course.')
        ->group(function() {
          Route::get('/', 'CourseManagementController@index')->name('index');
          Route::post('/{courseId}/update', 'CourseManagementController@update')->name('update');
          Route::get('/{courseId}/delete', 'CourseManagementController@delete')->name('delete');
          Route::post('/register', 'CourseManagementController@register')->name('register');
        });
        
        //head of department management routes
        Route::prefix('head-of-department')
        ->name('hod.')
        ->group(function() {
          Route::get('/', 'HodManagementController@index')->name('index');
          Route::post('/appoint', 'HodManagementController@appoint')->name('appoint');
          
        });

        //exam officer management routes
        Route::prefix('exam-officers')
        ->name('examofficer.')
        ->group(function() {
          Route::get('/', 'ExamOfficerManagementController@index')->name('index');
        });

        //lecturers appointment management routes
        Route::prefix('appointment')
        ->name('appointment.')
        ->group(function() {
          Route::get('/', 'AppointmentManagementController@index')->name('index');
        });
        
        //department lecturer management route
        Route::prefix('lecturers')
        ->name('lecturer.')
        ->group(function() {
          Route::get('/', 'LecturerManagementController@index')->name('index');
          Route::get('/create', 'LecturerManagementController@create')->name('create');
          Route::post('/register', 'LecturerManagementController@register')->name('register');
          Route::get('/{lecturerId}/edit', 'LecturerManagementController@edit')->name('edit');
          Route::post('/{lecturerId}/update', 'LecturerManagementController@update')->name('update');
          Route::get('/{lecturerId}/delete', 'LecturerManagementController@delete')->name('delete');

        });
        //department staff management route
        Route::prefix('staffs')
          ->name('staff.')
          ->group(function() {
            Route::get('/create-staff', 'StaffController@create')->name('create');
            Route::get('/{staff_id}/show', 'StaffController@show')->name('show');
            Route::get('/', 'StaffController@index')->name('index');
            Route::post('/register-staff', 'StaffController@register')->name('register');
            Route::post('/search-staff', 'StaffController@search')->name('search');
            Route::post('/{staff_id}/update-staff', 'StaffController@update')->name('update');
            Route::get('/{staff_id}/edit-staff', 'StaffController@edit')->name('edit');
            Route::get('/{staff_id}/delete-staff', 'StaffController@delete')->name('delete');
            
            Route::get('/staff-found', 'StaffController@staff')->name('staff');
            Route::get('/{staff_id}/register-complete', 'StaffController@registerComplete')->name('register.complete');
            Route::post('/{staff_id}/register-update', 'StaffController@registerUpdate')->name('register.update');
        });
		    //staff route group
			  // Route::prefix('staff')
     //      ->namespace('Staff')
     //      ->name('staff.')
     //      ->group(function() {
     //      Route::get('/', 'StaffController@index')->name('index');
     //      
     //      Route::post('/register-staff', 'StaffController@register')->name('register');
     //      Route::post('/search-staff', 'StaffController@search')->name('search');
     //      Route::post('/{staff_id}/update-staff', 'StaffController@update')->name('update');
     //      Route::get('/{staff_id}/edit-staff', 'StaffController@edit')->name('edit');
     //      Route::get('/{staff_id}/delete-staff', 'StaffController@delete')->name('delete');
     //      
     //      Route::get('/staff-found', 'StaffController@staff')->name('staff');
     //      Route::get('/{staff_id}/register-complete', 'StaffController@registerComplete')->name('register.complete');
     //      Route::post('/{staff_id}/register-update', 'StaffController@registerUpdate')->name('register.update');
     //    });
	    });
	  });  
  });
});
