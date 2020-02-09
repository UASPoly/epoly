@extends('examofficer::layouts.master')
@section('title')
    department create new admission page
@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('exam.officer.student.admission.search.state',request()->route('state'),request()->route('session'))}}
@endsection

@section('page-content')
    @include('department::department.student.pertials.student')
@endsection

@section('scripts')
<script>
	$(function() {
	    $('#state_student_table').DataTable({
	        
	    });
	});
</script>
@endsection