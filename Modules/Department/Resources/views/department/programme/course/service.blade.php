@extends('department::layouts.master')

@section('title')
    department registered service {{$status}} courses
@endsection

@section('page-content')
    @include('department::department.programme.course.pertials.service')
@endsection