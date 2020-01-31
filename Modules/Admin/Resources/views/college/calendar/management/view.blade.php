@extends('admin::layouts.master')
@section('title')
    admin {{currentSession()->name}} current calendar count down
@endsection
@section('page-content')
   @include('admin::college.calendar.management.pertials.view')
@endsection