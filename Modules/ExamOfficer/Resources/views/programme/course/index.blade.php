@extends('examofficer::layouts.master')
@section('title')
    department department available courses page
@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('examofficer.department.programme.courses',$programme)}}
@endsection

@section('page-content')
    @include('department::department.programme.course.pertials.index')
@endsection