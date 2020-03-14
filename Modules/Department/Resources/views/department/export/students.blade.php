  
    <!-- <b>
    <div style="text-align: center;"><br><br>
    	UMARU ALI SHINKAFI POLYTECHNIC SOKOTO<br>
    	COLLEGE OF {{strtoupper($course->department->college->name)}}<br>
    	DEPARTMENT OF {{strtoupper($course->department->name)}}<br>
    	EXAMINATION SCORE SHEET  {{$course->common_title}} <br>
    	SEMESTER........ {{strtoupper($course->semester->name)}} SESSION ........ {{$session->name}}<br>
    	COURSE CODE.............{{$course->code}} COURES TITLE........... {{strtoupper($course->title)}}<br><br>
    </div>
    </b> -->
    <table>
        <thead>
        	<tr>
	        	<th>S/N</th>
	        	<th>NAME</th>
	        	<th>ADMISSION NO</th>
	        	<th>STATE</th>
	        	<th>LOCAL GOVERNMENT</th>
	        	<th>PROGRAMME</th>
        	</tr>
        </thead> 
        <tbody>
        	@foreach(students as $student)
        	<tr>
        		<td>{{$loop->index+1}}</td>
        		<td>
        			{{strtoupper($student->first_name)}} {{strtoupper($student->middle_name)}} {{strtoupper($student->last_name)}}
        		</td>
        		<td>
        			{{$student->admission->admission_no}}
        		</td>
        		<td>
                    {{$student->studentAccount->lga->state->name}}
                </td>
                
        		<td>
                    {{$student->studentAccount->lga->name}}
                </td>
        		<td>
                    {{$sstudent->admission->programme->name}}
                </td>
        	
        	</tr>
        	@endforeach
        </tbody> 	
   </table>