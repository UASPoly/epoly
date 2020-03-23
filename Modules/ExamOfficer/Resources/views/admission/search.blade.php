@extends('examofficer::layouts.master')

@section('title')
    department register student search
@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('exam.officer.student.admission.search')}}
@endsection

@section('page-content')
    @include('department::department.admission.pertials.search')
@endsection

@section('scripts')
    @include('department::department.admission.pertials.programmeAjax')
@endsection