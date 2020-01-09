@extends('layouts.result')

@section('page-content')
    <div class="card">
    	<div class="card-body">
    		<div class="alert alert-success h4">Hi {{strtoupper(student()->first_name)}} {{strtoupper(student()->last_name)}} Congratualtion you fulfil all the requiremnet of the graduation from umaru ali shinkafi polytechnic computer science sokoto with CGPA of {{student()->cummulativeGradePointAverage()}}</div>
    	</div>
    </div>
@endsection
