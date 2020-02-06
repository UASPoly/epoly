<li>
    <a href="#">Colleges</a>
    <ul>
        <li>
        	<a href="{{route('admin.college.create')}}">Create New College</a>
        </li>
        <li><a href="{{route('admin.college.index')}}">View Colleges</a></li>
    </ul>
</li>

<li>
    <a href="#">Appointments</a>
    <!-- sub menu -->
    <ul>
        
        <li>
            <a href="{{route('admin.college.appointment.manage.index')}}">Academic</a>
        </li>
        <li>
            <a href="#">Non Academic</a>
        </li>
    </ul>
    <!-- / sub menu -->
</li>
<li><a href="{{route('admin.state.index')}}">States</a></li>