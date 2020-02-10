@extends('examofficer::layouts.master')

@section('title')
    department register student
@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('examofficer.department.programme.admissions',request()->route('programmeId'))}}
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