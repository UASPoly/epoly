@extends('examofficer::layouts.master')
@section('title')
    department student biodata edit page
@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('exam.officer.student.admission.search.session.view.edit',$student)}}
@endsection

@section('page-content')
    @include('department::department.student.pertials.edit')
@endsection

@section('scripts')
    @include('department::department.admission.pertials.imagePreview')
    @include('department::department.admission.pertials.programmeAjax')
    @include('department::department.admission.pertials.addressAjax')
@endsection