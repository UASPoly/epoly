@extends('examofficer::layouts.master')

@section('title')
    department student generate admission number
@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('exam.officer.student.admission.create')}}
@endsection

@section('page-content')
    @include('department::department.admission.pertials.create')
@endsection

@section('scripts')
    @include('department::department.admission.pertials.programmeAjax')
    @include('department::department.admission.pertials.serialNoAjax')
@endsection