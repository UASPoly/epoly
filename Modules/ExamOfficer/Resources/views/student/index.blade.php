@extends('examofficer::layouts.master')
@section('title')
    department create new admission page
@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('exam.officer.student.admission.search')}}
@endsection

@section('page-content')
    @include('department::department.student.pertials.index')
@endsection
