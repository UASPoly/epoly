@extends('lecturer::layouts.master')
@section('title')
    lecturer {{currentSession()->name}} {{currentSemester()->name}} current calendar count down
@endsection
@section('page-content')
   @include('admin::college.calendar.management.pertials.view')
@endsection