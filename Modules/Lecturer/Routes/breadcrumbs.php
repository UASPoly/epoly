<?php

Breadcrumbs::for('lecturer.dashboard', function ($breadcrumb) {
    $breadcrumb->push('Dashboard', route('lecturer.dashboard'));
});