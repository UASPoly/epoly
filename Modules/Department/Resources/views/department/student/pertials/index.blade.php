<div class="col-md-3"></div>
<div class="col-md-6"><br>
    <div class="card shadow">
        <div class="card-header shadow">
            <h5>Search Particular State Student</h5>
        </div>
        <div class="card-body">
            <form class="login-form" action="{{route($route)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Session</label>
                    <select name="session" class="form-control">
                        <option value="">Select Session</option>
                        @foreach(department()->sessions() as $session)
                            <option value="{{$session->id}}">{{$session->name}}</option>
                        @endforeach
                    </select>
                    @error('session')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
               
                <div class="form-group">
                    <label>State</label>
                    <select name="state" class="form-control">
                        <option value="">Select State</option>
                        @foreach(department()->states() as $state)
                            @if($state->catchment == 1)
                            <option value="{{$state->id}}">{{$state->name}}</option>
                            @endif
                        @endforeach
                        <option value="others">Others</option>
                    </select>
                    @error('state')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Admission Number</label>
                    <input type="text" name="admission_no" class="form-control" placeholder="Enter admission number">
                    @error('admission_no')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            
                <button name="search" value="search" class="btn btn-success btn-block shadow">Search</button><br>
                <button name="export" value="export" class="btn btn-success btn-block shadow">Export</button>
                
            </form>
        </div>
    </div>
</div>