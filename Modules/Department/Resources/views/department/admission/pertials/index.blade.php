<div class="col-md-12">
	<br>
	<div class="card shadow">
		<div class="card-header shadow">
			<h5 class="center">LIST OF REGISTERED STUDENTS IN {{strtoupper(department()->name)}}  FOR {{$session->name}} SESSION</h5>
		</div>
		<div class="card-body">
			@if(count(department()->admissions->where('session_id',$session->id))>0)
			    <table class="table shadow" id="admission-table">
			     	<thead>
			     		<tr>
			     			<th>S/N</th>
			     			<th>Name</th>
			     			<th>Admission No</th>
			     			<th>Schedule</th>
			     			<th>Programme</th>
			     			<th>Phone</th>
			     			<th>Status</th>
			     			<th></th>
			     		</tr>
			     	</thead>
			     	
			    </table>
			@else
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="alert alert-danger">No admission record found for {{department()}} as {{currentSession()->name}}</div>
			</div>
			@endif
		</div>
	</div>
</div>
       