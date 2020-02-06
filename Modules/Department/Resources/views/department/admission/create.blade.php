@extends('department::layouts.master')
@section('title')
    department create new admission page
@endsection

@section('page-content')
    @include('department::department.admission.pertials.create')
@endsection

@section('scripts')
    @include('department::department.admission.pertials.programmeAjax')
@endsection