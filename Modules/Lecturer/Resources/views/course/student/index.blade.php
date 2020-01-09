@extends('lecturer::layouts.master')

@section('page-content')
<div class="col-md-3"></div>
<div class="col-md-6">
	<div class="card">
		<div class="card-header button-fullwidth cws-button bt-color-3">Search Students</div>
		<div class="card-body">
			<form action="{{route('lecturer.courses.students.search')}}" method="post" enctype="multipart/form-data">
				@csrf
		    	@include('lecturer::result.pertials.course')
		    	<br>
		    	@include('lecturer::result.pertials.session')
		    	<br>
		    	<select class="form-control" name="specification">
		    		<option value="">Specification</option>
	                <option value="1">
	                	Available Students
	                </option>
	                <option value="2">
	                	Registered Students
	                </option>
		    	</select><br>
		    	<button class="btn-block button-fullwidth cws-button bt-color-3">Search Students</button>
		    </form>
		</div>
	</div>
</div> 
@endsection
