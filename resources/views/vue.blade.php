@extends('layouts.app')

@section('page-content')
   <div id="app">
   	   {{ message }}
   </div>
@endsection

@section('script')
    <script>
    	var app = new Vue({
		    el: '#app',
		    data: {
		        message: 'Hello Vue!'
		    }
		})
    </script>
@endsection    