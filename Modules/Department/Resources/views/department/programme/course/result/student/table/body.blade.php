<tbody>
	@foreach($registration->semesterRegistrations->where('semester_id',request()->route('semester_id')) as $registration)
    @include('department::department.programme.course.result.student.table.row')
	@endforeach
</tbody>