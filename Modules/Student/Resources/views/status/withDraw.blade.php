@extends('layouts.result')

@section('page-content')
    <div class="card">
    	<div class="card-body">
    		<div class="alert alert-danger h4">Hi {{strtoupper(student()->first_name)}} {{strtoupper(student()->last_name)}} Sorry you are been withdraw from the computer science with {{student()->cummulativeGradePointAverage()}} for more information contact your head of department</div>
    	</div>
    </div>
@endsection
