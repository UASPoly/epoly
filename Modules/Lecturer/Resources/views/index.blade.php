@extends('lecturer::layouts.master')

@section('title')
lecturer dashboard
@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('lecturer.dashboard')}}
@endsection

@section('page-content')
<div class="col-md-12">
    <br>
    <div class="card shadow">
        <div class="card-header">
            <b class="text text-danger" >Notification !!!</b> 
        </div>
        <div class="card-body">
            
        </div>
    </div>
</div>
@endsection
