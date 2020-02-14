@extends('student::layouts.master')

@section('title')
student dashboard
@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('student.dashboard')}}
@endsection

@section('page-content')
<div class="col-md-12">
    <br>
    <div class="card shadow">
        <div class="card-header shadow">
            <b class="text text-danger" >{{student()->level()->name}} Notification !!!</b> 
        </div>
        <div class="card-body">
            
        </div>
    </div>
</div>    
@endsection