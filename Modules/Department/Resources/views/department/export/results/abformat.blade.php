<table>

    @include('department::department.programme.course.result.student.table.header')

    <tbody>
        @foreach($registrations as $registration)
            @foreach($registration->semesterRegistrations->where('semester_id',$semester->id) as $registration)
                @include('department::department.programme.course.result.student.table.row')
            @endforeach
        @endforeach
    </tbody>

</table>