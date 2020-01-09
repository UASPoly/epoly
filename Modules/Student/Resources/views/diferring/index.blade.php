@extends('student::layouts.master')

@section('page-content')
    <div class="col-md-3"></div>
	<div class="col-md-6"><br>
	    <div class="row">
	    	<div class="col-md-12"><br>
	    		<h3 class="text-success text-center">Make Diferring Application here</h3><br>
	    	</div>
	    </div>
	    <div class="card">
	    	<div class="card-body">
	    		<form class="login-form" action="{{route('student.diferring.apply')}}" method="post">
			        @csrf
			        <div class="form-group">
			        	<label class="text-success">Session</label>
			            <select name="session" class="form-control">
			            	@foreach($sessions as $session)
			            	    <option value="{{$session->id}}">{{$session->name}}</option>
			            	@endforeach
			            </select>
			        </div>
			        <div class="form-group">
			            <label class="text-success">If wishes to diferred a Semester</label>
			            <select name="semester" class="form-control">
			                <option value=""></option>
			                @foreach($semesters as $semester)
			            	    <option value="{{$semester->id}}">{{$semester->name}}</option>
			            	@endforeach
			            </select>
			        </div>
			        <button class="button-fullwidth cws-button bt-color-3 btn-block">Apply</button>
			    </form>
	    	</div>
	    </div>
	</div>
@endsection
