@extends('examofficer::layouts.master')

@section('title')
    department register student
@endsection

@section('page-content')
    @include('department::department.admission.pertials.create')
@endsection

@section('scripts')
    @include('department::department.admission.pertials.programmeAjax')
@endsection