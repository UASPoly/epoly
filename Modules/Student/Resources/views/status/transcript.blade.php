@extends('student::layouts.master')

@section('page-content')
<div class="col-md-12">
    <div class="card shadow">
    	<div class="card-body table-responsive-md">
    		<div class="row">
    			<div class="col-md-4">
    				<table class="table table-borderless">
		    			<tr>
		    				<td><b>Full Name</b></td>
		    				<td>{{student()->first_name}} {{student()->middle_name}} {{student()->last_name}}</td>
		    			</tr>
		    			<tr>
		    				<td><b>Admission No</b></td>
		    				<td>{{student()->admission->admission_no}}</td>
		    			</tr>
		    			<tr>
		    				<td><b>Department</b></td>
		    				<td>{{student()->admission->department->name}}</td>
		    			</tr>
		    			<tr>
		    				<td><b>Programme</b></td>
		    				<td>{{student()->admission->programme->title}}</td>
		    			</tr>
		    		</table>
    			</div>
    			<div class="col-md-8"></div>
    		</div>
	    		@foreach(student()->admission->programme->programmeLevels as $programmeLevel)
	            <table class="table table-dark">
	            	<tr>
	                	<td colspan=""><b>{{$programmeLevel->name}} First Semester</b></td>
	                </tr>
	            </table>
	            <table class="table" style="border-style: dotted;">
	                <thead>
	                	<tr>
	                		<th>Course Title</th>
	                		<th>Course Code</th>
	                		<th>Course Unit</th>
	                		<th>Grade</th>
	                		<th>Grade Points</th>
	                		<th>Number of Attempt</th>
	                		<th>Remark</th>
	                	</tr>
	                </thead>
	                <tbody>
	                @foreach($programmeLevel->levelCourses() as $course)
	                    @if($course->semester->id == 1)
	                    <tr>
	                    	<td>{{$course->title}}</td>
	                    	<td>{{$course->code}}</td>
	                    	<td>{{$course->unit}}</td>
	                    	<td>grade</td>
	                    	<td>grade points</td>
	                    	<td>attempt</td>
	                    	<td>remark</td>
	                    </tr>
	                    @endif
	                @endforeach
                    </tbody>
                </table>
                <table class="table table-dark">
	            	<tr>
	                	<td colspan=""><b>{{$programmeLevel->name}} Second Semester</b></td>
	                </tr>
	            </table>
                <table class="table">
                    <thead>
	                	<tr>
	                		<th>Course Title</th>
	                		<th>Course Code</th>
	                		<th>Course Unit</th>
	                		<th>Grade</th>
	                		<th>Grade Points</th>
	                		<th>Number of Attempt</th>
	                		<th>Remark</th>
	                	</tr>
	                </thead>
	                <tbody>
	                @foreach($programmeLevel->levelCourses() as $course)
	                    @if($course->semester->id == 2)
	                    <tr>
	                    	<td>{{$course->title}}</td>
	                    	<td>{{$course->code}}</td>
	                    	<td>{{$course->unit}}</td>
	                    	<td>grade</td>
	                    	<td>grade points</td>
	                    	<td>attempt</td>
	                    	<td>remark</td>
	                    </tr>
	                    @endif
	                @endforeach
	                </tbody>
	            </table>    
	    		@endforeach
    		
    	</div>
    </div>
</div>
@endsection
