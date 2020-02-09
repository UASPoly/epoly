@extends('examofficer::layouts.master')
@section('title')
    department programme edit course
@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('examofficer.department.programme.course.edit',$course)}}
@endsection

@section('page-content')
    @include('department::department.programme.course.pertials.edit')
@endsection