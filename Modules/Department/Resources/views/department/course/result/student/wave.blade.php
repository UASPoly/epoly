@extends('layouts.result')

@section('page-content')
<div class="text text-center">
	UMARU ALI SHINKAFI POLYTECHNIC SOKOTO<br>
	COLEEGE OF COLLEGE OF SCIENCE AND TECHNOLOGY<br>
	DEPARTMENT OF COMPUTER SCIENCE EXAMINATION RESULTS OF {{'2018/2019'}} SESSION<br><br>
	NATIONAL DIPLOMA IN COMPUTER SCIENCE II (MORNING)<br><br>
	NDSC II (M)
</div>
<div class="table-responsive table-condenced">
<table class="table table-bordered">
    @include('department::department.course.result.student.table.wave.header')
	<tbody>
	@foreach($registrations as $registration)
        @foreach($registration->semesterRegistrations->where('semester_id',request()->route('semester_id')) as $registration)
            @include('department::department.course.result.student.table.wave.row')
        @endforeach
	@endforeach
    </tbody>
</table>
{{ $registrations->links() }}
</div>
@endsection