<li>
    <a href="{{route('student.course.registered.show')}}">My Courses</a>
</li>
<li>
    <a href="{{route('student.course.results.show')}}">Results History</a>
</li>
<li>
	@if(student()->makeCurrentSessionRegistration())
        <a href="{{route('student.course.registration.add.drop')}}">Add Or Drop Coures</a>
    @else
        <a href="{{route('student.course.registration.courses')}}">Course Registraion</a>
    @endif
</li>
<li>
    <a href="#">Applications</a>
    <!-- sub menu -->
    <ul>
        <li><a href="{{route('student.diferring.index')}}">Diferment</a></li>
        <li><a href="#">Late Course Registration</a></li>
        <li><a href="#">Add Or Drop Courses</a></li>
    </ul>
    <!-- / sub menu -->
</li>