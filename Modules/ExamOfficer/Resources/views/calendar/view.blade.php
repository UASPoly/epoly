@extends('examofficer::layouts.master')
@section('title')
    exam officer {{currentSession()->name}} current calendar count down
@endsection
@section('page-content')
   @include('admin::college.calendar.management.pertials.view')
@endsection