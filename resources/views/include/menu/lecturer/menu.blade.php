<li>
    <a href="{{route('lecturer.courses.index')}}">My Courses</a>
</li>
@if(lecturer()->hasValidExamOfficerAppointment())
<li>
    <a href="#">Department Results</a>
    <ul>
        <li>
            <a href="{{route('department.student.result.index')}}">Check Student Results</a>
        </li>
        <li>
            <a href="#">Results Statistics</a>
        </li>
        <li>
            <a href="{{route('department.result.course.index')}}">View Result</a>
        </li>
        <li>
            <a href="{{route('department.result.course.bating.index')}}">AB Format</a>
        </li>
        <li>
            <a href="{{route('department.result.remark.index')}}">Remarks</a>
        </li>
    </ul>
</li>
@endif
<li>
    <a href="#">My Results</a>
    <ul>
        <li>
        	<a href="{{route('lecturer.result.templete.index')}}">Download Result Templete</a>
        </li>
        <li>
            <a href="{{route('lecturer.result.upload.index')}}">Upload Result</a>
        </li>
        <li>
            <a href="{{route('lecturer.result.index')}}">Search Result</a>
        </li>
        <li>
            <a href="{{route('lecturer.courses.results.statistics.index')}}">Result Statistics</a>
        </li>
    </ul>
</li>
<li>
    <a href="{{route('lecturer.courses.students.index')}}">Students</a>
</li>

