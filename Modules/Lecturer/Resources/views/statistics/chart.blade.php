@extends('lecturer::layouts.master')

@section('page-title')
    {{session('data')['course']->code}} exam report
@endsection

@section('page-content')
<h3>{{session('data')['session']->name}} {{session('data')['course']->code}} Examination result Report</h3>
<div class="col md-12">
    {!! $chart->container() !!}
    {!! $chart->script() !!}
</div>
@endsection


