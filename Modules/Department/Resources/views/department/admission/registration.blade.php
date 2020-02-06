@extends('department::layouts.master')

@section('title')
    department admission number registration
@endsection

@section('page-content')
    @include('department::department.admission.pertials.registration')
@endsection

@section('scripts')
    @include('department::department.admission.pertials.imagePreview')
    @include('department::department.admission.pertials.addressAjax')
@endsection