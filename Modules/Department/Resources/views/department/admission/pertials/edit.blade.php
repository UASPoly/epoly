<div class="col-md-3"></div>
<div class="col-md-6"><br>
    <div class="row">
    	<div class="col-md-12">
    		<h3>Edit Admission</h3>
    	</div>
    </div>
    
    <form class="login-form" action="{{route($route ?? 'department.admission.update',[$admission->id])}}" method="post">
        @csrf
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" class="form-control" value="{{$admission->student->first_name}}">
            @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" class="form-control" value="{{$admission->student->last_name}}">
            @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Gender</label>
            <select name="gender" class="form-control">
                <option value="{{$admission->student->studentAccount->gender->id ?? ''}}">{{$admission->student->studentAccount->gender->name ?? ''}}</option>
                @foreach($admission->genders() as $gender)
                    <option value="{{$gender->id}}">{{$gender->name}}</option>
                @endforeach
            </select>
            @error('gender')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Date Of Birth</label>
            <input type="date" name="last_name" class="form-control" value="{{$admission->student->studentAccount->date_of_birth}}">
            @error('date_of_birth')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" class="form-control" value="{{$admission->student->last_name}}">
            @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label>Religion</label>
            <select name="religion" class="form-control">
                <option value="{{$admission->student->studentAccount->religion->id ?? ''}}">{{$admission->student->studentAccount->religion->name ?? ''}}</option>
                @foreach($admission->religions() as $religion)
                    <option value="{{$religion->id}}">{{$religion->name}}</option>
                @endforeach
            </select>
            @error('religion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{$admission->student->phone}}">
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
        	<label>Admission No</label>
            <input type="text" disabled="" name="admission_no" class="form-control" value="{{$admission->admission_no}}">
            @error('admission_no')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
        	<label>Programme</label>
            <select name="programme" class="form-control">
            	<option value="{{$admission->programme->id}}">{{$admission->programme->title}}</option>
            	@foreach(department()->programmes as $programme)
            	    @if($admission->programme->id != $programme->id)
                    <option value="{{$programme->id}}">{{$programme->title}}</option>
                    @endif
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
                <option value="{{$admission->student->schedule->id}}">{{$admission->student->schedule->name}}</option>
                @foreach(department()->schedules() as $schdule)
                    @if($admission->student->schedule->id != $schdule->id)
                        <option value="{{$schdule->id}}">
                            {{$schdule->name}}
                        </option>
                    @endif
                @endforeach
            </select>
            @error('schedule')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button class="button-fullwidth cws-button bt-color-3">Update</button>
    </form><br><br>
</div>