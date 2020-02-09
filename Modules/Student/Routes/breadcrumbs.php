<?php

Breadcrumbs::for('student.dashboard', function ($breadcrumb) {
    $breadcrumb->push('Dashboard', route('student.dashboard'));
});