@extends('admin::layouts.master')

@section('title')
    admin {{currentSession()->name}} calendar management page
@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('admin.college.calendar')}}
@endsection

@section('page-content')
   @include('admin::college.calendar.management.pertials.index')
@endsection