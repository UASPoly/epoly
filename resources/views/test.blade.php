@extends('layouts.app')

@section('page-content')
  <div class="container" id="app">
    
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal">Testing modal</button>
        <!-- modal -->
<div class="modal fade" id="modal" tabindex="-1"  role="dialog">
    <div class="modal-dialog" role="document">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header shadow">	
                <h4>sokoto State Information</h4>
            </div>
            <div class="modal-body">
            	
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
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
