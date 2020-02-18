@extends('department::layouts.master')
@section('title')
    department create new admission page
@endsection

@section('page-content')
    @include('department::department.student.pertials.edit')
@endsection

@section('scripts')
    @include('department::department.admission.pertials.imagePreview')
    @include('department::department.admission.pertials.programmeAjax')
    @include('department::department.admission.pertials.addressAjax')
@endsection