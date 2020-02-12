<?php

Breadcrumbs::for('department.dashboard', function ($breadcrumb) {
    $breadcrumb->push('Dashboard', route('department.hod.dashboard'));
});