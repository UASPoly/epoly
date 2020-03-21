<table>

    @include('department::department.programme.course.result.student.table.header')

    <tbody>
        @foreach($semesterRegistration as $registration)
            @include('department::department.programme.course.result.student.table.row')
        @endforeach
    </tbody>

</table>