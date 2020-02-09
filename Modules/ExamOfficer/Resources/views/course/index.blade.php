@extends('examofficer::layouts.master')
@section('title')
    department department available courses page
@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('examofficer.department.courses')}}
@endsection

@section('page-content')
    @include('department::department.course.pertials.index')
@endsection