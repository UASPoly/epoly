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

Route::prefix('department')
->name('department.')
->group(function() {
    //programme routes
	Route::prefix('programmes')
		->name('programme.')
		->namespace('Programme')
		->group(function() {
			Route::get('/', 'ProgrammeController@index')->name('index');
			Route::get('/{programmeId}/admissions', 
					'ProgrammeController@currentSessionProgrammeAdmissions')->name('admissions');

			Route::prefix('{programmeId}/course')
			->name('course.')
			->namespace('Course')
			->group(function() {
                
                //services courses routes
				Route::get('/service-in', 'ServiceCourseController@serviceInCourses')->name('service.in');
				Route::post('/service-in/register', 'ServiceCourseController@register')->name('service.register');

				Route::post('/service-in/{departmentCourseId}/update', 'ServiceCourseController@update')->name('service.update');

				Route::get('/service-in/{departmentCourseId}/delete', 'ServiceCourseController@delete')->name('service.delete');

				Route::get('/service-out', 'ServiceCourseController@serviceOutCourses')->name('service.out');
                
                //internal courses routes
				Route::get('/', 'CourseController@index')->name('index');
				Route::get('/create-course', 'CourseController@create')->name('create');
				Route::post('{course_id}/update', 'CourseController@update')->name('update');
				Route::get('{course_id}/edit', 'CourseController@edit')->name('edit');
				Route::post('/register', 'CourseController@register')->name('register');
				Route::get('{course_id}/delete', 'CourseController@delete')->name('delete');

				Route::prefix('allocation')
				->name('allocation.')
				->group(function() {
					Route::get('/', 'CourseAllocationController@index')->name('index');
					Route::post('/register', 'CourseAllocationController@register')->name('register');
					
				});
				
			});	

		});
    //admission routes
	Route::prefix('student/admission')
		->name('student.admission.')
		->namespace('Admission')
		->group(function() {

			Route::get('/search', 'AdmissionController@search')->name('search');

			Route::post('/available', 'AdmissionController@index')->name('index');

			Route::get('/generate-admission-number', 'AdmissionController@generateNumberIndex')->name('generate.number.index');

			Route::post('{admission_id}/update-admission', 'AdmissionController@update')->name('update');

			Route::post('{admissionNo}/register-genrated-number', 'AdmissionController@registerGeneratedNumber')->name('register.generated.number');

			Route::get('{admission_id}/edit-admission', 'AdmissionController@edit')->name('edit');
			Route::get('{admissionNo}/programme/{programmeId}/generated-number-registration', 'AdmissionController@generatedNumberRegistration')->name('register.generated.number.index');

			Route::get('{admission_id}/revoke-admission', 'AdmissionController@revokeAdmission')->name('revoke');

			Route::post('/generate-number', 'AdmissionController@generateNumber')->name('generate.number');

			Route::get('{admission_id}/delete-admission', 'AdmissionController@delete')->name('delete');
			
		});
		//student routes
		Route::prefix('student/')
		->name('student.')
		->namespace('Student')
		->group(function() {
            Route::get('{studentID}/biodata/view', 'StudentController@viewBiodata')->name('view.biodata');
            Route::get('{studentID}/biodata/edit', 'StudentController@editBiodata')->name('biodata.edit');
            Route::post('{studentID}/biodata/update', 'StudentController@updateBiodata')->name('biodata.update');
            Route::get('/', 'StudentController@student')->name('student.index');
            Route::get('/{state}/{session}/admitted', 'StudentController@availableStudent')->name('student.available');
            Route::post('/search', 'StudentController@searchStudent')->name('student.search');

		});
    Route::prefix('lecturer')
		->name('lecturer.')
		->group(function() {
        Route::get('/','DepartmentLecturerController@index')->name('index');
        
        //appointment routes
        Route::prefix('appointment')
		->name('appointment.')
		->group(function() {
            Route::post('/register','DepartmentLecturerAppointmentController@register')->name('register');
		});
	});
    Route::prefix('calendar')
    ->name('calendar.')
    ->namespace('Calendar')
    ->group(function() {
        Route::get('/view', 'CalendarController@view')->name('view');
    });			
    //wave result routes
	Route::prefix('students/results/wave')
	    ->name('students.results.wave.')
	    ->namespace('Result')
	    ->group(function() {
            Route::get('/', 'WaveResultController@index')->name('index');
		    Route::post('/search', 'WaveResultController@search')->name('search');
		    Route::get('/semester/{semester_id}/view', 'WaveResultController@view')->name('view');
		    Route::get('/result/{result_id}/register', 'WaveResultController@waveResult')->name('register');
	    });		
	Route::prefix('diferring')
		->name('diferring.')
		->namespace('Admission')
		->group(function() {
        Route::get('/','DiferringController@index')->name('index');
        Route::get('/{type}/{diferred_id}/verify','DiferringController@verify')->name('verify');
        Route::get('/{type}/{diferred_id}/delete','DiferringController@delete')->name('delete');
	});	
	//exam officer routes
	Route::prefix('exam-officer')
	->name('exam.officer.')
	->group(function(){
        Route::get('/','DepartmentExamOfficerController@index')->name('index');
        Route::get('/{exam_officer_id}/revoke','DepartmentExamOfficerController@revokeExamOfficer')->name('revoke');
	});
    Route::prefix('student/result')
		->name('student.result.')
		->namespace('Course')
		->group(function() {
			Route::post('/search', 'StudentResultController@searchResult')->name('search');
		    Route::get('/', 'StudentResultController@index')->name('index');
		    Route::get('/semester/{semester_id}/display', 'StudentResultController@viewResult')->name('view');
		});

    Route::prefix('result/course')
	->name('result.course.')
	->namespace('Course')
	->group(function() {
	    Route::get('/', 'CourseResultController@index')->name('index');
		Route::post('/search', 'CourseResultController@search')->name('search');
		Route::get('/vetting', 'VettingResultController@index')->name('vetting.index');
		Route::post('/vetting/search', 'VettingResultController@search')->name('vetting.search');
		Route::get('/vetting/semester/{semester_id}/view', 'VettingResultController@view')->name('vetting.view');
    });

    //remark routes
    Route::prefix('result/remark')
	->name('result.remark.')
	->namespace('Course')
	->group(function() {
	    Route::get('/', 'RemarkController@index')->name('index');
	    Route::post('semester/{semester_id}/register', 'RemarkController@register')->name('register');
	    Route::post('/registration/search', 'RemarkController@searchRegistration')->name('registration.search');
	    Route::get('semester/{semester_id}/registration/view', 'RemarkController@viewRegistration')->name('registration.view');
	});
	//department score sheets routes
	Route::prefix('result/score-sheet')
	    ->name('results.scoresheet.')
	    ->namespace('Result')
	    ->group(function() {
            Route::get('/download', 'ScoreSheetController@downloadIndex')->name('download.index');
            Route::post('/download/score-sheet', 'ScoreSheetController@downloadScoreSheet')->name('download');
            Route::post('/upload/result', 'ScoreSheetController@uploadScoreSheet')->name('upload');
		    Route::get('/upload', 'ScoreSheetController@uploadIndex')->name('upload.index');
	    });
    //graduation routes
    Route::prefix('graduation')
    ->name('graduation.')
    ->namespace('Graduation')
    ->group(function() {
        Route::get('/', 'GraduationController@graduationIndex')->name('graduate.index');
        Route::get('/spill', 'GraduationController@spillOverIndex')->name('spill.index');
        Route::get('/with-draw', 'GraduationController@withDrawIndex')->name('withdraw.index');
        Route::post('/search/graduates', 'GraduationController@searchGraduateStudents')->name('search.graduates');
        Route::post('/search/spill-overs', 'GraduationController@searchSpillingStudents')->name('search.spills');
        Route::post('/search/with-draws', 'GraduationController@searchWithDrawedStudents')->name('search.withdraws');
    });
	//result routes
	Route::prefix('result/{result_id}')
	->name('result.')
	->namespace('Course')
	->group(function() {
		//course result routes
		Route::prefix('course')
		->name('course.')
		->group(function() {
			Route::get('/review', 'CourseResultController@review')->name('review');
			Route::get('/amend', 'CourseResultController@amend')->name('amend');
			Route::post('/approve', 'CourseResultController@approve')->name('approve');
			Route::post('/amend/register', 'CourseResultController@amendResult')->name('amend.register');
			Route::get('/edit', 'CourseResultController@editCourseResult')->name('edit');
			

		});

		//students result routes
		Route::prefix('student')
		->name('student.')
		->group(function() {
		    Route::get('/edit', 'StudentResultController@edit')->name('edit');
		    Route::post('/update', 'StudentResultController@update')->name('update');
		});
		


		
	});


	Route::get('/', 'DepartmentController@verify')->name('verify');
	Route::get('/hod', 'DepartmentController@verify')->name('verify');
	//hod authentication routes
	    Route::name('hod.')
		->group(function() {
			Route::get('/dashboard', 'DepartmentController@index')->name('dashboard');
			Route::get('/login', 'Auth\DepartmentLoginController@showLoginForm')->name('auth.login');
			Route::get('/Authorisation/fail', 'Auth\DepartmentLoginController@unauthorize')->name('auth.auth');

			Route::get('/unauthorize-staff', 'Auth\DepartmentLoginController@unauthorize')->name('auth.unauthorize');
			Route::post('/login', 'Auth\DepartmentLoginController@login')->name('login');
			Route::post('logout', 'Auth\DepartmentLoginController@logout')->name('auth.logout');
		});
		

		Route::prefix('admission')
		->name('admission.')
		->namespace('Admission')
		->group(function() {

			Route::get('/', 'AdmissionController@index')->name('index');

			Route::get('/create-admission', 'AdmissionController@create')->name('create');

			Route::post('{admission_id}/update-admission', 'AdmissionController@update')->name('update');

			Route::get('{admission_id}/edit-admission', 'AdmissionController@edit')->name('edit');

			Route::get('{admission_id}/revoke-admission', 'AdmissionController@revokeAdmission')->name('revoke');

			Route::post('/register-admission', 'AdmissionController@register')->name('register');

			Route::get('{admission_id}/delete-admission', 'AdmissionController@delete')->name('delete');
			
		});
    
});
