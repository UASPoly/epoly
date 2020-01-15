@extends('examofficer::layouts.master')
@section('title')
    department student biodata edit page
@endsection

@section('page-content')
    @include('department::department.student.pertials.edit')
@endsection

@section('script')
    @include('department::department.admission.pertials.imagePreview')
@endsection