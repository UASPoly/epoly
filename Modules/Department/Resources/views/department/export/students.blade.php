
    <table>
        <thead>
        	<tr>
	        	<th>NAME</th>
	        	<th>ADMISSION NO</th>
	        	<th>STATE</th>
	        	<th>LOCAL GOVERNMENT</th>
	        	<th>PROGRAMME</th>
	        	<th>PHONE NO</th>
        	</tr>
        </thead> 
        <tbody>
        	@foreach($students as $student)
        	<tr>
        		
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
                    {{$student->admission->programme->title}}
                </td>

				<td>
                    {{$student->phone}}
                </td>
        	
        	</tr>
        	@endforeach
        </tbody> 	
   </table>