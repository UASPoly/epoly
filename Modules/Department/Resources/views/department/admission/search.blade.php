@extends('department::layouts.master')

@section('title')
    department registered courses
@endsection

@section('page-content')
    @include('department::department.admission.pertials.search')
@endsection

@section('scripts')
    @include('department::department.admission.pertials.programmeAjax')
@endsection