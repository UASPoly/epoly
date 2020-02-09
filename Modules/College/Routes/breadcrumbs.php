<?php

Breadcrumbs::for('college.dashboard', function ($breadcrumb) {
    $breadcrumb->push('Dashboard', route('college.dashboard'));
});