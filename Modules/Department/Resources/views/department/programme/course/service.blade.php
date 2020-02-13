@extends('department::layouts.master')

@section('title')
    department registered service {{$status}} courses
@endsection

@section('page-content')
    @include('department::department.programme.course.pertials.service')
@endsection

@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){
        $('select[name="department"]').on('change',function(){
            var department_id = $(this).val();
            if(department_id){
                $.ajax({
                    url: '/core/ajax/department/'+department_id+'/get-department-courses',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                   	   $('select[name="course"]').empty();
                   	   $.each(data, function(key, value){
                   	   	$('select[name="course"]').append('<option value="'+key+'">'+ value +'</option>');
                   	   });
                   }
                });
            } else {
                $('select[name="course"]').empty();
            }
        });
	});
</script>
@endsection