<div class="col-md-3"></div>
<div class="col-md-6"><br>
    <div class="card shadow">
        <div class="card-header shadow">
            <h5>New Admissions</h5>
        </div>
        <div class="card-body">
            <form class="login-form" action="{{route($route ?? 'department.admission.register')}}" method="post">
                @csrf
                <div class="form-group">
                	<label>Programme</label>
                    <select name="programme" class="form-control">
                    	<option value="">Choose Programme</option>
                    	@foreach(department()->programmes as $programme)
                            @if(old('programme') == $programme->id)
                                <option value="{{$programme->id}}" selected>{{$programme->title}}</option>
                            @else
                                <option value="{{$programme->id}}" >{{$programme->title}}</option>
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
                                <option value="">Choose Schedule</option>
                            </select>
                            @error('schedule')
                                <span class="invalid-feedback" role=t">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                           @enderror
                 </div>
                <button class=" btn-block button-fullwidth cws-button bt-color-3">Generate Admission Number</button>
            </form>
        </div>
    </div>
</div>
