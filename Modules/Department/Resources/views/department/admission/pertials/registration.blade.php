<div class="col-md-3"></div>

<div class="col-md-6">
    <br>
    <div class="card shadow">
        <div class="card-body">
            <form class="login-form" action="{{route($route ?? 'department.admission.update',[$admissionNo])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <input type="hidden" name="programmeId" value="{{request()->route('programmeId')}}">
                        <div class="col-md-12 mb-2">
                            <img id="picture_preview_container" src="{{asset('img/user.png')}}"
                                alt="" width="140" height="150" class="rounded">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group input-sm">
                            <input type="text" name="first_name" id="validate" class="form-control" value="{{old('first_name')}}" placeholder="First Name" />
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6"></div>

                    <!-- middle name start -->
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" name="middle_name" class="form-control" value="{{old('middle_name')}}" placeholder="Middle Name">
                            @error('middle_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                    <!-- middle name end -->

                    <!-- last name start -->
                    <div class="col-md-10">
                        <div class="form-group">
                            <input type="text" name="last_name" class="form-control" value="{{old('last_name')}}" placeholder="Last Name">
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                    <!-- last name end -->

                    <!-- start gender -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="gender" class="form-control" id="validate">
                                <option value="">Select Gender</option>
                                @foreach(department()->genders() as $gender)
                                    @if($gender->id == old('gender'))
                                        <option value="{{$gender->id}}" selected>{{$gender->name}}</option>
                                    @else
                                        <option value="{{$gender->id}}">{{$gender->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="religion" class="form-control">
                                <option value="">Select Religion</option>
                                @foreach(department()->religions() as $religion)
                                    @if($religion->id == old('religion'))
                                        <option value="{{$religion->id}}" selected>{{$religion->name}}</option>
                                    @else
                                        <option value="{{$religion->id}}">{{$religion->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('religion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" maxlength="11" name="phone" class="form-control" value="{{old('phone')}}" placeholder="Phone No">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="date" name="date_of_birth" class="form-control datepicker" data-date-format="dd/mm/yyyy" value="{{old('date_of_birth')}}" placeholder="date of birth">
                            @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="state" class="form-control">
                                <option value="">Select State</option>
                                @foreach(department()->states() as $state)
                                    @if($state->id == old('state'))
                                        <option value="{{$state->id}}" selected>{{$state->name}}</option>
                                    @else
                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="lga" class="form-control">
                                <option value="">Select LGA</option>
                                <!-- options are comming from ajax request from the state selected -->
                            </select>
                            @error('student_session')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" disabled="" class="form-control" value="{{$admissionNo}}">
                            <input type="hidden" name="admission_no" class="form-control" value="{{$admissionNo}}">
                            @error('admission_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">   
                        <div class="form-group">
                            <input type="file" name="picture" value="{{old('picture')}}" class="form-control" id="picture">
                            @error('picture')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">  
                        <div class="form-group">
                            <textarea rows="2" cols="100" name="address" placeholder="Address" class="form-control">{{old('address')}}</textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <button class="btn btn-success btn-block">
                            Register
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
    