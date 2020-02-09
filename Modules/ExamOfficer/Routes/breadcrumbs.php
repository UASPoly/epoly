<?php
// Dashboard
Breadcrumbs::for('examofficer.dashboard', function ($breadcrumb) {
    $breadcrumb->push('Dashboard', route('exam.officer.dashboard'));
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

// Dasboard > Admission > Search
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

