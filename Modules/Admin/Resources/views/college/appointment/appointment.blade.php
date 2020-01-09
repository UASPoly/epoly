<!-- modal -->
<div class="modal fade" id="staff_{{$staff->id}}_appointment" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">	
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            	@if($staff->headOfDepartment && !$staff->headOfDepartment->to)
     				<!-- if staff is appinted -->
     				<button class="btn btn-primary btn-block"><a href="{{route('admin.college.department.staff.show',['staff_id'=>$staff->id])}}" style="color: white">Revoke HOD Appointmnet</a></i>
     				</button>

     				<!-- edit appointment -->
     				<button class="btn btn-info btn-block"><a href="{{route('admin.college.department.staff.edit',['staff_id'=>$staff->id])}}" style="color: white">Edit HOD Appointment</a></i>
     				</button>
                    
                    <!-- delete appointment -->
     				<button class="btn btn-info btn-block"><a href="{{route('admin.college.department.staff.edit',['staff_id'=>$staff->id])}}" style="color: white">Delete HOD Appointment</a></i>
     				</button>
                @else
                    <!-- if the staff is not appinted to hod -->
     				<button class="btn btn-info btn-block" onclick="confirm('Are you sure you want appoint this staff as Head of department')"><a href="{{route('admin.college.department.appointment.hod.create',[$staff->id])}}" style="color: white">Appointed To HOD</a> </i>
     				</button><br>
                @endif
                @if($staff->directer && !$staff->directer->to)
                    <!-- if staff is appinted -->
     				<button class="btn btn-primary btn-block"><a href="{{route('admin.college.department.staff.show',['staff_id'=>$staff->id])}}" style="color: white">Revoke Directer Appointmnet</a></i>
     				</button>

     				<!-- edit appointment -->
     				<button class="btn btn-info btn-block"><a href="{{route('admin.college.department.staff.edit',['staff_id'=>$staff->id])}}" style="color: white">Edit Directer Appointment</a></i>
     				</button>
                    
                    <!-- delete appointment -->
     				<button class="btn btn-info btn-block"><a href="{{route('admin.college.department.staff.edit',['staff_id'=>$staff->id])}}" style="color: white">Delete Directer Appointment</a></i>
     				</button>
                @else 
                    <!-- if the staff is not appointed to directer -->
     				<button class="btn btn-info btn-block"><a href="{{route('admin.college.appointment.directer.create',['staff_id'=>$staff->id])}}" style="color: white" onclick="confirm('Are you sure you want appoint this staff College Directer')">Appointed To Directer</a></i></button>
                @endif
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->