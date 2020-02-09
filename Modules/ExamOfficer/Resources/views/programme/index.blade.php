@extends('examofficer::layouts.master')
@section('title')
    department available programmes
@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('examofficer.department.programmes')}}
@endsection

@section('page-content')
    @include('department::department.programme.partials.index')
@endsection