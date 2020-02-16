  
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
	        	<th>CA (40)</th>
	        	<th>EXAM (60)</th>
	        	<th>TOTAL (100)</th>
	        	<th>GRADE</th>
	        	<th>REMARK</th>
        	</tr>
        </thead> 
        <tbody>
        	@foreach($courseRegistrations as $courseRegistration)
        	<tr>
        		<td>{{$loop->index+1}}</td>
        		<td>
        			{{strtoupper($courseRegistration->admission->student->first_name)}} {{strtoupper($courseRegistration->admission->student->last_name)}}
        		</td>
        		<td>
        			{{$courseRegistration->admission->admission_no}}
        		</td>
        		<td>
                    {{$courseRegistration->result->ca == '--' ? ' ' : $courseRegistration->result->ca}}
                </td>
        		<td>
                    {{$courseRegistration->result->exam == '--' ? ' ' : $courseRegistration->result->exam}}
                </td>
        		<td>
                    {{$courseRegistration->result->exam == '--' ? ' ' : $courseRegistration->result->ca + $courseRegistration->result->ca}}
                </td>
        		<td>
                    {{$courseRegistration->result->grade}}
                </td>
        		<td>
                    {{optional($courseRegistration->result->remark)->name}}
                </td>
        	</tr>
        	@endforeach
        </tbody> 	
   </table>