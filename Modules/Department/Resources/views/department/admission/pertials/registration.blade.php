<div class="col-md-2">
    
</div>

<div class="col-md-8">
    <br>
    <div class="card shadow">
        <div class="card-body">
            <form class="login-form" action="{{route($route ?? 'department.admission.update',[$admissionNo])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- start personal infor -->
                    <div class="col-md-4">
                        <input type="hidden" name="programmeId" value="{{request()->route('programmeId')}}">
                        <div class="col-md-12 mb-2">
                            <img id="picture_preview_container" src="{{storage_url('user.png')}}"
                                alt="" width="140" height="150">
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="first_name" id="validate" class="form-control" value="{{old('first_name')}}" />
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Middle Name</label>
                            <input type="text" name="middle_name" class="form-control" value="{{old('middle_name')}}">
                            @error('middle_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text"  id="validate"  name="last_name" class="form-control" value="{{old('last_name')}}">
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        
                    </div>
                   
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Admission No</label>
                            <input type="text" disabled="" class="form-control" value="{{$admissionNo}}">
                            <input type="hidden" name="admission_no" class="form-control" value="{{$admissionNo}}">
                            @error('admission_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Religion</label>
                            <select name="religion" class="form-control">
                                <option value=""></option>
                                @foreach(department()->religions() as $religion)
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
                            <label>Gender</label>
                            <select name="gender" class="form-control" id="validate">
                                <option value=""></option>
                                @foreach(department()->genders() as $gender)
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
                            <input type="date" name="date_of_birth" class="form-control datepicker" data-date-format="dd/mm/yyyy" value="{{old('date_of_birth')}}">
                            @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>  
                    </div>
                    
                    <div class="col-md-4">
                        
                            <div class="form-group">
                                <label>State</label>
                                <select name="state" class="form-control">
                                    <option value=""></option>
                                    @foreach(department()->states() as $state)
                                        <option value="{{$state->id}}">{{$state->name}}</option>
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
                                    <option value=""></option>
                                    @foreach(department()->lgas() as $lga)
                                        <option value="{{$lga->id}}">
                                            {{$lga->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('student_session')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Home Address</label>
                                <input type="text" name="address" value="{{old('address')}}" class="form-control">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        <div class="form-group">
                            <label>Choose Picture</label>
                            <input type="file" name="picture" value="{{old('picture')}}" class="form-control" id="picture">
                            @error('picture')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button class="button-fullwidth btn-block cws-button bt-color-3">
                            Register
                        </button>
                        
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
    