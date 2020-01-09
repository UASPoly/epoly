<br>
<br>
<div class="col-md-3"></div>
<div class="col-md-6">
	<br>
    <br>
	<div class="card">
		<div class="card-header button-fullwidth cws-button bt-color-3">Upload Result Here</div>
		<div class="card-body">
			<form action="{{route($route ?? 'lecturer.result.upload.upload')}}" method="post" enctype="multipart/form-data">
				@csrf
		    	@include('lecturer::result.pertials.course')<br>
		    	@include('lecturer::result.pertials.session')<br>
		    	<input type="file" name="result" class="form-control"><br>
		    	<button class="btn-block button-fullwidth cws-button bt-color-3">Upload</button>
		    </form>
		</div>
	</div>
</div> 