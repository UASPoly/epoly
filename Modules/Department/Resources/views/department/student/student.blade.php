@extends('department::layouts.master')
@section('title')
    department create new admission page
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