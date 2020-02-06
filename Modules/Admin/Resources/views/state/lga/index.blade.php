@extends('admin::layouts.master')

@section('page-content')
<div class="col-md-12">
    <br>
    <div class="card shadow">
        <div class="card-body shadow">
        	<table class="table shadow" id="lgas-table">
        		<thead>
        			<tr>
        				<th>S/N</th>
        				<th>Local government Name</th>
        				<th>Registered At</th>
        				<th>Updated At</th>
        				<th></th>
        				
        			</tr>
        		</thead>
        		<tbody>
        			@foreach($lgas as $lga)
                        <tr>
                        	<td>{{$loop->index+1}}</td>
                        	<td>{{$lga->name}}</td>
                        	<td>{{$lga->created_at}}</td>
                        	<td>{{$lga->updated_at}}</td>
                        	<td>
                        		<button data-toggle="modal" data-target="#lga_{{$lga->id}}" class="btn btn-info">Edit</button>
                        		@include('admin::state.lga.edit')
                        		<button class="btn btn-danger">Delete</button>
                        	</td>
                        </tr>
        			@endforeach
        		</tbody>
        	</table>
        </div>
    </div>
</div>    
@endsection

@section('scripts')
<script>
	$(function() {
	    $('#lgas-table').DataTable({
	        
	    });
	});
</script>
@endsection