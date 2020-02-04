@extends('layouts.app')

@section('page-content')
  <div class="container" id="app">
    
        {{message}}
        
  </div>
@endsection


@section('scripts')
  <script>

    const app = new Vue({
      el: '#app',
      data: {
        message: 'testing'
      },

    })

  </script>
@endsection
