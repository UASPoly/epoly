@extends('college::layouts.master')

@section('title')
college drecter dashboard
@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('college.dashboard')}}
@endsection

@section('page-content')
<div class="col-md-12">
    <br>
    <div class="card shadow">
        <div class="card-header shadow">
            <b class="text text-danger" >Notification !!!</b> 
        </div>
        <div class="card-body">
            
        </div>
    </div>
</div>
    
@endsection
