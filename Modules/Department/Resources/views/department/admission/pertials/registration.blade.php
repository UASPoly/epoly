<div class="col-md-2"></div>
<div class="col-md-8">
    <br>
    <div class="card shadow">
        <div class="card-body">
            <form class="login-form" action="{{route($route ?? 'department.admission.update',[$admissionNo])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- start personal infor -->
                    <div class="col-md-12">
                        <div class="tab"><b>Personal Info:</b>
                            <input type="hidden" name="programmeId" value="{{request()->route('programmeId')}}">

                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="first_name" id="validate" class="form-control" value="{{old('first_name')}}" oninput="this.className = ''"/>
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
                                <input type="text"  id="validate"  name="last_name" class="form-control" value="{{old('last_name')}}" oninput="this.className = ''">
                                @error('last_name')
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
                        </div>
                    </div>
                    <!-- end personal infor -->
                    <!-- start contact infor -->
                    <div class="col-md-12">
                        <div class="tab"><b>Contact Info:</b>
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
                                <label>Date Of Birth</label>
                                <input type="date" name="date_of_birth" class="form-control datepicker" data-date-format="mm/dd/yyyy" value="{{old('date_of_birth')}}">
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
                        </div>
                    </div>
                    <!-- end contact infor -->
                    <!-- start address infor -->
                    <div class="col-md-12">
                        <div class="tab"><b>Address Info:</b>
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
                        </div>
                    </div>
                    <!-- end address infor -->
                    <div class="col-md-12">
                        <div class="tab"><b>Upload Info:</b>
                            <div class="col-md-12 mb-2">
                                <img id="picture_preview_container" src=""
                                    alt="preview image" style="max-height: 150px;">
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
                </div>

                <div class="row">
                    <div class="col-md-12"><br></div>
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-primary" id="prevBtn" onclick="nextPrev(-1)">
                            Previous
                        </button>
                        <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">
                            Next
                        </button>
                    </div>
                </div>
                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:40px;">
                  <span class="step"></span>
                  <span class="step"></span>
                  <span class="step"></span>
                  <span class="step"></span>
                </div>

                </form>
            </div>
        </div>
    </div>
</div>
    