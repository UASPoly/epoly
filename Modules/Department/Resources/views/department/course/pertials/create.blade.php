<div class="col-md-3"></div>
<div class="col-md-6"><br>
	<div class="card">
		<div class="card-body">
		    <div class="row">
		    	
		    	<div class="col-md-12">
		    		<h3 class="text text-success">New Course</h3>
		    	</div>
		    </div>
		    
		    <form class="login-form" action="{{route($route ?? 'department.course.register')}}" method="post">
		        @csrf
		        <div class="form-group">
		        	<label class="text text-success centered">Couser Title</label>
		            <input type="text" name="title" class="form-control" placeholder="course title">
		            @error('title')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label class="text text-success centered">Couser Code</label>
		            <input type="text" name="code" class="form-control" placeholder="course code">
		            @error('code')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label class="text text-success centered">Couse Unit</label>
		            <select name="unit" class="form-control">
		                <option value="">Course Unit</option>
		                @foreach([1,2,3,4,5,6] as $unit)
		                    <option value="{{$unit}}">{{$unit}}</option>
		                @endforeach
		            </select>
		        </div>
		        <div class="form-group">
		        	<label class="text text-success centered">Programme</label>
		            <select name="level" class="form-control">
		            	<option value=""></option>
		            	@foreach(department()->levels() as $level)
		            	     @if($level->id <= 5)
		                     <option value="{{$level->id}}">{{$level->name}}</option>
		                     @endif
		            	@endforeach
		            </select>
		            @error('level')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label class="text text-success centered">Semester</label>
		            <select name="semester" class="form-control">
		            	<option value=""></option>
		            	@foreach(department()->semesters() as $semester)
		                     <option value="{{$semester->id}}">{{$semester->name}}</option>
		            	@endforeach
		            </select>
		            @error('semester')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <button class="button-fullwidth cws-button bt-color-3">Register</button>
		    </form><br><br>
		</div>
	</div>
</div>