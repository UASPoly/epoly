@extends('lecturer::layouts.master')

@section('page-content')
<div class="col-md-3"></div>
<div class="col-md-6">
	<div class="card">
		<div class="card-header button-fullwidth cws-button bt-color-3">Search your uploaded result</div>
		<div class="card-body">
			<form action="{{route('lecturer.result.search')}}" method="post">
				@csrf
		    	@include('lecturer::result.pertials.course')
		    	<br>
		    	@include('lecturer::result.pertials.session')
		    	<br>
		    	<button class="btn-block button-fullwidth cws-button bt-color-3">Search Result</button>
		    </form>
		</div>
	</div>
</div> 
@endsection
