<!-- modal -->
<div class="modal fade shadow" id="lecturer_{{$lecturer->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <b>{{$lecturer->staff->first_name}} {{$lecturer->staff->last_name}} of {{$lecturer->staff->department->name}} Department in the College Of {{$lecturer->staff->department->college->name}}</b>	
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                @if($lecturer->staff->headOfDepartment && !$lecturer->staff->headOfDepartment->to)
     				<!-- if staff is appointed -->
     				<button class="btn btn-primary btn-block"><a href="{{route('admin.college.department.appointment.hod.revoke',[
                        $lecturer->id])}}" style="color: white">Revoke {{$lecturer->staff->department->name}} Department HOD Appointmnet</a></i>
     				</button>

     				<!-- edit appointment -->
     				<button class="btn btn-info btn-block"><a href="{{route('admin.college.department.appointment.hod.edit',[
                        $lecturer->id])}}" style="color: white">Edit {{$lecturer->staff->department->name}} Department HOD Appointment</a></i>
     				</button>
                    
                    <!-- delete appointment -->
     				<button class="btn btn-info btn-block"><a href="{{route('admin.college.department.appointment.hod.delete',[
                        $lecturer->id])}}" style="color: white">Delete {{$lecturer->staff->department->name}} Department HOD Appointment</a></i>
     				</button>
                @else
                    <!-- if the staff is not appinted to hod -->
     				<button class="btn btn-info btn-block" onclick="confirm('Are you sure you want appoint this staff as Head of department')"><a href="{{route('admin.college.department.appointment.hod.create',[
                        $lecturer->id])}}" style="color: white">Appoint As {{$lecturer->staff->department->name}} Department HOD</a> </i>
     				</button><br>
                @endif

                @if($lecturer->staff->directer && !$lecturer->staff->directer->to)
                    <!-- if staff is appinted -->
     				<button class="btn btn-primary btn-block"><a href="{{route('admin.college.department.management.staff.show',[str_replace(' ','-',strtolower($lecturer->staff->department->name)),
                        $lecturer->staff->department->id,$lecturer->id])}}" style="color: white">Revoke {{$lecturer->staff->department->college->name}} College Directer Appointmnet</a></i>
     				</button>

     				<!-- edit appointment -->
     				<button class="btn btn-info btn-block"><a href="{{route('admin.college.department.management.staff.edit',[str_replace(' ','-',strtolower($lecturer->staff->department->name)),
                        $lecturer->staff->department->id,$lecturer->id])}}" style="color: white">Edit {{$lecturer->staff->department->college->name}} College Directer Appointment</a></i>
     				</button>
                    
                    <!-- delete appointment -->
     				<button class="btn btn-info btn-block"><a href="{{route('admin.college.department.management.staff.edit',[str_replace(' ','-',strtolower($lecturer->staff->department->name)),
                        $lecturer->staff->department->id,$lecturer->id])}}" style="color: white">Delete {{$lecturer->staff->department->college->name}} College Directer Appointment</a></i>
     				</button>
                @else 
                    <!-- if the staff is not appointed to directer -->
     				<button class="btn btn-info btn-block"><a href="{{route('admin.college.appointment.directer.create',[str_replace(' ','-',strtolower($lecturer->staff->department->name)),
                        $lecturer->staff->department->id,$lecturer->id])}}" style="color: white" onclick="confirm('Are you sure you want appoint this staff College Directer')">Appointed As {{$lecturer->staff->department->college->name}} College Directer</a></i></button>
                @endif
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->