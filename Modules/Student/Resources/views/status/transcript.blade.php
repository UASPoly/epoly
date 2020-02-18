@extends('student::layouts.master')

@section('page-content')
<div class="col-md-12">
    <div class="card shadow">
    	<div class="card-body table-responsive-md">
    		<div class="row">
    			<div class="col-md-5">
    				<table class="table table-sm table-borderless">
		    			<tr>
		    				<td><b>Full Name :</b></td>
		    				<td>{{student()->first_name}} {{student()->middle_name}} {{student()->last_name}}</td>
		    			</tr>
		    			<tr>
		    				<td width="120"><b>Adm. No :</b></td>
		    				<td>{{student()->admission->admission_no}}</td>
		    			</tr>
		    			<tr>
		    				<td><b>College :</b></td>
		    				<td>{{strtoupper(student()->admission->department->college->name)}}</td>
		    			</tr>
		    			<tr>
		    				<td><b>Department :</b></td>
		    				<td>{{strtoupper(student()->admission->department->name)}}</td>
		    			</tr>
		    			<tr>
		    				<td><b>Programme :</b></td>
		    				<td>{{student()->admission->programme->title}}</td>
		    			</tr>
		    		</table>
    			</div>
    			<div class="col-md-4"></div>
    			<div class="col-md-3">
    				<img src="{{storage_url(user_image())}}" width="120" height="140" class="rounded">
    			</div>
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
	                    	<td>{{student()->getThisCourseResult($course->id) ? student()->getThisCourseResult($course->id)->grade : '--'}}</td>
	                    	<td>{{student()->getThisCourseResult($course->id) ? student()->getThisCourseResult($course->id)->points : '--'}}</td>
	                    	<td>{{student()->getThisCourseAttempts($course->id)}}</td>
	                    	<td>{{student()->getThisCourseResult($course->id) ? student()->getThisCourseResult($course->id)->remark->name : '--'}}</td>
	                    </tr>
	                    @endif
	                @endforeach
	                <tr>
	                	<td></td>
	                	<td></td>
	                	<td></td>
	                	<td></td>
	                	<td></td>
	                	<td colspan=""><b>G.P.A</b></td>
	                	<td><b>{{student()->getThisSemesterGradePointsAverage($programmeLevel,1)}}</b></td>
	                </tr>
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
	                    	<td>{{student()->getThisCourseResult($course->id) ? student()->getThisCourseResult($course->id)->grade : '--'}}</td>
	                    	<td>{{student()->getThisCourseResult($course->id) ? student()->getThisCourseResult($course->id)->points : '--'}}</td>
	                    	<td>{{student()->getThisCourseAttempts($course->id)}}</td>
	                    	<td>{{student()->getThisCourseResult($course->id) ? student()->getThisCourseResult($course->id)->remark->name : '--'}}</td>
	                    </tr>
	                    @endif
	                @endforeach
	                <tr>
	                	<td></td>
	                	<td></td>
	                	<td></td>
	                	<td></td>
	                	<td></td>
	                	<td colspan=""><b>G.P.A</b></td>
	                	<td><b>{{student()->getThisSemesterGradePointsAverage($programmeLevel,2)}}</b></td>
	                </tr>
	                </tbody>
	            </table>    
	    		@endforeach
    		    <table class="table table-borderless">
    		    	<tr>
	                	<td></td>
	                	<td></td>
	                	<td></td>
	                	<td></td>
	                	<td></td>
	                	<td colspan="" class="h5"><b>C.G.P.A</b></td>
	                	<td class="h5"><b>{{student()->getCumulativeGradePointAverage()}}</b></td>
	                </tr>
    		    </table>
    	</div>
    </div>
</div>
@endsection
