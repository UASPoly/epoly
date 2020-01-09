@extends('layouts.result')

@section('page-content')
	<form action="{{route('student.course.registration.add.drop.register')}}" method="post">
	    @csrf
		@include('student::course.registration.pertials.registered')
		<br>
		@include('student::course.registration.pertials.carryOver')
		<br>
	    <button class="btn-block button-fullwidth cws-button bt-color-3">Register</button>
	</form>

@endsection
