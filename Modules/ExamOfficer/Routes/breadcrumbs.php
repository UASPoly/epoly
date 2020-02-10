<?php
// Dashboard
Breadcrumbs::for('examofficer.dashboard', function ($breadcrumb) {
    $breadcrumb->push('Dashboard', route('exam.officer.dashboard'));
});

// Dashboard > Programmes
Breadcrumbs::for('examofficer.department.programmes', function ($breadcrumb) {
    $breadcrumb->parent('examofficer.dashboard');
    $breadcrumb->push('Programmes', route('exam.officer.department.programme.index'));
});

// Dashboard > Programme > admissions
Breadcrumbs::for('examofficer.department.programme.admissions', function ($breadcrumb,$programmeId) {
    $breadcrumb->parent('examofficer.department.programmes');
    $breadcrumb->push('Admission list '.currentSession()->name, route('exam.officer.department.programme.admissions',[$programmeId]));
});

// Dashboard > Programme > courses
Breadcrumbs::for('examofficer.department.programme.courses', function ($breadcrumb,$programme) {
    $breadcrumb->parent('examofficer.department.programmes');
    $breadcrumb->push('Courses', route('exam.officer.department.programme.course.index',[$programme->id]));
});

// Dashboard > Programme > courses > edit
Breadcrumbs::for('examofficer.department.programme.course.edit', function ($breadcrumb,$course) {
    $breadcrumb->parent('examofficer.department.programme.courses',$course->programme);
    $breadcrumb->push('Edit '.$course->code, route('exam.officer.department.programme.course.edit',[$course->programme->id, $course->id]));
});

// Dasboard > Admission
Breadcrumbs::for('exam.officer.student.admission.create', function ($breadcrumb) {
    $breadcrumb->parent('examofficer.dashboard');
    $breadcrumb->push('Admission', route('exam.officer.student.admission.generate.number.index'));
});

// Dasboard > Admission > 195493001 Registration
Breadcrumbs::for('exam.officer.student.admission.registration', function ($breadcrumb, $admissionNo,$programmeId) {
    $breadcrumb->parent('exam.officer.student.admission.create');
    $breadcrumb->push($admissionNo.' Registration', route('exam.officer.student.admission.register.generated.number.index',[$admissionNo,$programmeId]));
});

// Dasboard > Admission > Search
Breadcrumbs::for('exam.officer.student.admission.search', function ($breadcrumb) {
    $breadcrumb->parent('exam.officer.student.admission.create');
    $breadcrumb->push('Search', route('exam.officer.student.admission.search'));
});

// Dasboard > Admission > Search > state/2019-2020
Breadcrumbs::for('exam.officer.student.admission.search.state', function ($breadcrumb,$state,$session) {
    $breadcrumb->parent('exam.officer.student.admission.search');
    $breadcrumb->push($state.'/'.$session, route('exam.officer.student.student.available',[$state,$session]));
});

// Dasboard > Admission > Search > 2019/2020
Breadcrumbs::for('exam.officer.student.admission.search.session', function ($breadcrumb,$session) {
    $breadcrumb->parent('exam.officer.student.admission.search');
    $breadcrumb->push($session->name, route('exam.officer.student.admission.session.available',[$session->id]));
});

// Dasboard > Admission > Search > 2019/2020 > View
Breadcrumbs::for('exam.officer.student.admission.search.session.view', function ($breadcrumb,$student) {
    $breadcrumb->parent('exam.officer.student.admission.search.session',$student->admission->session);
    $breadcrumb->push($student->admission->admission_no.' View', route('exam.officer.student.view.biodata',[$student->id]));
});

// Dasboard > Admission > Search > 2019/2020 > View > Edit
Breadcrumbs::for('exam.officer.student.admission.search.session.view.edit', function ($breadcrumb,$student) {
    $breadcrumb->parent('exam.officer.student.admission.search.session.view',$student);
    $breadcrumb->push('Edit', route('exam.officer.student.biodata.edit',[$student->id]));
});

