@extends('examofficer::layouts.master')

@section('title')
    department register student
@endsection
@section('breadcrumbs')
{{Breadcrumbs::render('exam.officer.student.admission.search.session',$session ?? '')}}
@endsection
@section('page-content')
    @include('department::department.admission.pertials.index')
@endsection

@section('scripts')
<script>
	$(function() {
	    $('#admission-table').DataTable({
	        
	    });
	});
</script>
@endsection