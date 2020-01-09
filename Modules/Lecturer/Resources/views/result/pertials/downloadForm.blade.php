
<div class="col-md-3"></div>
<div class="col-md-6">
	<br>
    <br>
	<div class="card">
		<div class="card-header button-fullwidth cws-button bt-color-3">Download Result Templete Here</div>
		<div class="card-body">
			<form action="{{route($route ?? 'lecturer.result.templete.download')}}" method="post">
				@csrf
		    	@include('lecturer::result.pertials.course')<br>
		    	@include('lecturer::result.pertials.session')<br>
		    	<button class="btn-block button-fullwidth cws-button bt-color-3">Download Score Sheet</button>
		    </form>
		</div>
	</div>
</div> 