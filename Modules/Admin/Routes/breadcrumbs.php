<?php

Breadcrumbs::for('admin.dashboard', function ($breadcrumb) {
    $breadcrumb->push('Dashboard', route('admin.dashboard'));
});