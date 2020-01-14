<div class="col-md-3"></div>
<div class="col-md-6"><br>

	<div class="row">
    	<div class="col-md-8"></div>
    	<div class="col-md-4"><img src="{{storage_url($student->studentAccount->picture)}}" height="120" width="140"></div>
    </div>

    <div class="row">
    	<div class="col-md-12">
    		<h3>Edit Student Biodata</h3>
    	</div>
    </div>
    
    <form class="login-form" action="{{route($route ?? 'department.student.biodata.update',[$student->admission->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="admission_id" value="{{$student->admission->id}}">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" class="form-control" value="{{$student->first_name}}">
            @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Middle Name</label>
            <input type="text" name="middle_name" class="form-control" value="{{$student->middle_name}}">
            @error('middle_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" class="form-control" value="{{$student->last_name}}">
            @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Gender</label>
            <select name="gender" class="form-control">
                <option value="{{$student->studentAccount->gender->id ?? ''}}">{{$student->studentAccount->gender->name ?? ''}}</option>
                @foreach($student->admission->genders() as $gender)
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
            <input type="date" name="date_of_birth" class="form-control" value="{{$student->studentAccount->date_of_birth}}">
            @error('date_of_birth')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Religion</label>
            <select name="religion" class="form-control">
                <option value="{{$student->studentAccount->religion->id ?? ''}}">{{$student->studentAccount->religion->name ?? ''}}</option>
                @foreach($student->admission->religions() as $religion)
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
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{$student->email}}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{$student->phone}}">
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
        	<label>Admission No</label>
            <input type="text" disabled="" name="admission_no" class="form-control" value="{{$student->admission->admission_no}}">
            @error('admission_no')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
        	<label>Programme</label>
            <select name="programme" class="form-control">
            	<option value="{{$student->admission->programme->id}}">{{$student->admission->programme->name}}</option>
            	@foreach(department()->programmes as $programme)
            	    @if($student->admission->programme->id != $programme->id)
                    <option value="{{$programme->id}}">
                        {{$programme->name}}
                    </option>
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
                <option value="{{$student->schedule->code}}">{{$student->schedule->name}}</option>
                @foreach(department()->schedules() as $schedule)
                    @if($student->schedule->id != $schedule->id)
                        <option value="{{$schedule->code}}">
                            {{$schedule->name}}
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
        <div class="form-group">
            <label>State</label>
            <select name="state" class="form-control">
                <option value="{{$student->studentAccount->lga->state->id}}">{{$student->studentAccount->lga->state->name}}</option>
                @foreach(department()->states() as $state)
                    @if($student->studentAccount->lga->state->id != $state->id)
                        <option value="{{$state->id}}">
                            {{$state->name}}
                        </option>
                    @endif
                @endforeach
            </select>
            @error('state')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Local Government</label>
            <select name="lga" class="form-control">
                <option value="{{$student->studentAccount->lga->id}}">{{$student->studentAccount->lga->name}}</option>
                @foreach(department()->lgas() as $lga)
                    @if($student->studentAccount->lga->id != $lga->id)
                        <option value="{{$lga->id}}">
                            {{$lga->name}}
                        </option>
                    @endif
                @endforeach
            </select>
            @error('lga')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Home Address</label>
            <input type="text" value="{{$student->studentAccount->address}}" name="address" class="form-control">
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Change Student Picture</label>
            <input type="file" value="{{$student->studentAccount->picture}}" name="picture" class="form-control">
            @error('picture')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button class="button-fullwidth cws-button bt-color-3">Update Changes</button>
    </form><br><br>
</div>