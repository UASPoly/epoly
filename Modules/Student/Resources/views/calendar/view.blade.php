@extends('student::layouts.master')
@section('title')
    student {{currentSession()->name}} current calendar count down
@endsection
@section('page-content')
   @include('admin::college.calendar.management.pertials.view')
@endsection