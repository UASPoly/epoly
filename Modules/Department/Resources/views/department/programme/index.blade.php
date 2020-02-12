@extends('department::layouts.master')

@section('title')
{{department()->name}} registered programmes
@endsection

@section('breadcrumbs')

@endsection

@section('page-content')
   @include('department::department.programme.partials.index')
@endsection