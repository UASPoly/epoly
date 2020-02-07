<?php

Breadcrumbs::for('examofficer.dashboard', function ($trail) {
    $trail->push('Dashboard', route('exam.officer.dashboard'));
});

Breadcrumbs::for('exam.officer.student.admission.create', function ($breadcrumb) {
    $breadcrumb->parent('examofficer.dashboard');
    $breadcrumb->push('Admission', route('exam.officer.student.admission.generate.number.index'));
});