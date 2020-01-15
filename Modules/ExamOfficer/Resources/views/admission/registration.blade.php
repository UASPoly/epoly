@extends('examofficer::layouts.master')

@section('title')
    department admission number registration
@endsection

@section('page-content')
    @include('department::department.admission.pertials.registration')
@endsection

@section('script')
    @include('department::department.admission.pertials.imagePreview')
@endsection