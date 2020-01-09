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
    <a href="#">Departments</a>
    <!-- sub menu -->
    <ul>
        <li><a href="{{route('admin.college.department.index')}}">View Department</a></li>
        <li><a href="{{route('admin.college.department.create')}}">Register Department</a></li>
        <li><a href="#">Upload Departments</a></li>
    </ul>
    <!-- / sub menu -->
</li>

<li>
    <a href="#">Staffs</a>
    <!-- sub menu -->
    <ul>
        
        <li>
        	<a href="{{route('admin.college.department.staff.create')}}">Register Staff</a>
        </li>
        <li>
        	<a href="{{route('admin.college.department.staff.index')}}">View Staffs</a>
        </li>
        <li>
        	<a href="#">Upload Staffs</a>
        </li>
    </ul>
    <!-- / sub menu -->
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