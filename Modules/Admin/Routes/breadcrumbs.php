<?php
//Dashboard
Breadcrumbs::for('admin.dashboard', function ($breadcrumb) {
    $breadcrumb->push('Dashboard', route('admin.dashboard'));
});

//Dashboard > Colleges
Breadcrumbs::for('admin.colleges.index', function ($breadcrumb) {
	$breadcrumb->parent('admin.dashboard');
    $breadcrumb->push('Colleges', route('admin.college.index'));
});
//Dashboard > Calendar
Breadcrumbs::for('admin.college.calendar', function ($breadcrumb) {
	$breadcrumb->parent('admin.dashboard');
    $breadcrumb->push(currentSession()->name.' Calendar', route('admin.college.index'));
});

//Dashboard > Admission
Breadcrumbs::for('admin.college.admission', function ($breadcrumb) {
	$breadcrumb->parent('admin.dashboard');
    $breadcrumb->push('Admission', route('admin.college.admission.index'));
});

//Dashboard > Admission > session count down
Breadcrumbs::for('admin.college.admission.summary', function ($breadcrumb,$session) {
	$breadcrumb->parent('admin.college.admission');
    $breadcrumb->push($session->name.' Summary', route('admin.college.admission.index'));
});

//Dashboard > Colleges > collage name
Breadcrumbs::for('admin.college.management', function ($breadcrumb,$college) {
	$breadcrumb->parent('admin.colleges.index');
    $breadcrumb->push($college->name, route('admin.college.management.index',[$college->id]));
});

//Dashboard > Colleges > collage name > Edit
Breadcrumbs::for('admin.college.management.edit', function ($breadcrumb,$college) {
	$breadcrumb->parent('admin.college.management',$college);
    $breadcrumb->push('Edit', route('admin.college.index'));
});

//Dashboard > Colleges > collage name > department name
Breadcrumbs::for('admin.college.department.management', function ($breadcrumb,$department) {
	$breadcrumb->parent('admin.college.management',$department->college);
    $breadcrumb->push($department->name, route('admin.college.department.management.index',[$department->id]));
});

//Dashboard > Colleges > collage name > department name >Edit
Breadcrumbs::for('admin.college.department.management.edit', function ($breadcrumb,$department) {
	$breadcrumb->parent('admin.college.department.management',$department);
    $breadcrumb->push('Edit', route('admin.college.department.management.index',[$department->id]));
});

//Dashboard > Colleges > collage name > department name > appointment
Breadcrumbs::for('admin.college.department.management.appointment', function ($breadcrumb,$department) {
	$breadcrumb->parent('admin.college.department.management',$department);
    $breadcrumb->push('Appointment', route('admin.college.department.management.index',[$department->id]));
});

//Dashboard > Colleges > collage name > department name > Programme
Breadcrumbs::for('admin.college.department.management.programme', function ($breadcrumb,$department) {
	$breadcrumb->parent('admin.college.department.management',$department);
    $breadcrumb->push('Programmes', route('admin.college.department.management.programme.index',[$department->id]));
});

//Dashboard > Colleges > collage name > department name > Programme > edit
Breadcrumbs::for('admin.college.department.management.programme.edit', function ($breadcrumb,$department) {
	$breadcrumb->parent('admin.college.department.management.programme',$department);
    $breadcrumb->push('Edit', route('admin.college.department.management.index',[$department->id]));
});

//Dashboard > Colleges > collage name > department name > Courses
Breadcrumbs::for('admin.college.department.management.courses', function ($breadcrumb,$department) {
	$breadcrumb->parent('admin.college.department.management',$department);
    $breadcrumb->push('Registered Courses', route('admin.college.department.management.index',[$department->id]));
});

//Dashboard > Colleges > collage name > department name > head of departments
Breadcrumbs::for('admin.college.department.head.management', function ($breadcrumb,$department) {
	$breadcrumb->parent('admin.college.department.management',$department);
    $breadcrumb->push('Head of departments', route('admin.college.index'));
});

//Dashboard > Colleges > collage name > department name > Exam officers
Breadcrumbs::for('admin.college.department.examofficer.management', function ($breadcrumb,$department) {
	$breadcrumb->parent('admin.college.department.management',$department);
    $breadcrumb->push('Exam officers', route('admin.college.index'));
});

//Dashboard > Colleges > collage name > department name > Lecturers
Breadcrumbs::for('admin.college.department.lecturer.management', function ($breadcrumb,$department) {
	$breadcrumb->parent('admin.college.department.management',$department);
    $breadcrumb->push('Lecturer', route('admin.college.department.management.lecturer.index',[$department->id]));
});

//Dashboard > Colleges > collage name > department name > Lecturers > Create
Breadcrumbs::for('admin.college.department.lecturer.create', function ($breadcrumb,$department) {
	$breadcrumb->parent('admin.college.department.lecturer.management',$department);
    $breadcrumb->push('Create', route('admin.college.department.management.lecturer.index',[$department->id]));
});

//Dashboard > Colleges > collage name > department name > Lecturers > Edit
Breadcrumbs::for('admin.college.department.lecturer.edit', function ($breadcrumb,$department) {
	$breadcrumb->parent('admin.college.department.lecturer.management',$department);
    $breadcrumb->push('Edit', route('admin.college.department.management.lecturer.index',[$department->id]));
});