@extends('admin::layouts.master')

@section('page-content')
<div class="col-md-12">
    <br>
    <div class="card shadow">
        <div class="card-body shadow">
        	<table class="table shadow" id="states-table">
        		<thead>
        			<tr>
        				<th>S/N</th>
        				<th>State Name</th>
        				<th>Registered At</th>
        				<th>Updated At</th>
        				<th>LGAs</th>
        				<th></th>
        				
        			</tr>
        		</thead>
        		<tbody>
        			@foreach($states as $state)
                        <tr>
                        	<td>{{$loop->index+1}}</td>
                        	<td>{{$state->name}}</td>
                        	<td>{{$state->created_at}}</td>
                        	<td>{{$state->updated_at}}</td>
                        	<td>{{count($state->lgas)}}</td>
                        	<td>
                        		<button data-toggle="modal" data-target="#state_{{$state->id}}" class="btn btn-info">Edit</button>
                        		@include('admin::state.edit')
                        		<button class="btn btn-danger">Delete</button>
                        		<a href="{{route('admin.state.lga.index',[$state->id])}}">
                        			<button class="btn btn-success">LGAs</button>
                        		</a>
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
	    $('#states-table').DataTable({
	        
	    });
	});
</script>
@endsection