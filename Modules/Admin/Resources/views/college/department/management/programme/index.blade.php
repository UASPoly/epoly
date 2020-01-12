@extends('admin::layouts.master')
@section('title')
    admin {{$department->name}} programme management page
@endsection
@section('page-content')
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <button data-toggle="modal" data-target="#newProgramme" class="btn-block button-fullwidth cws-button bt-color-3">New Programme</button>
    </div>
    @include('admin::college.department.management.programme.programme')
@endsection