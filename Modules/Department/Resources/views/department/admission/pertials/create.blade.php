<div class="col-md-4"></div>
<div class="col-md-4"><br>
    <div class="row">
    	<div class="col-md-12">
    		<h3>New Admission</h3>
    	</div>
    </div>
    <form class="login-form" action="{{route($route ?? 'department.admission.register')}}" method="post">
        @csrf
        <div class="form-group">
        	<label>Programme</label>
            <select name="programme" class="form-control">
            	<option value=""></option>
            	@foreach(department()->departmentProgrammes as $departmentProgramme)
                    <option value="{{$departmentProgramme->id}}">{{$departmentProgramme->programme->name}}</option>
            	@endforeach
            </select>
            @error('programme')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Schedule</label>
            <select name="schedule" class="form-control">
                <option value=""></option>
                @foreach(department()->schedules() as $schedule)
                    <option value="{{$schedule->code}}">{{$schedule->name}}</option>
                @endforeach
            </select>
            @error('session')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button class="button-fullwidth cws-button bt-color-3">Generate Admission Number</button>
    </form><br><br>
</div>