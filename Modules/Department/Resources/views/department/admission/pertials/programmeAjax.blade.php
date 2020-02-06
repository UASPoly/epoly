<script type="text/javascript">
	$(document).ready(function(){
        $('select[name="programme"]').on('change',function(){
            var programme_id = $(this).val();
            if(programme_id){
                $.ajax({
                   url: '/core/ajax/programme/'+programme_id+'/get-programme-schedules',
                   type: 'GET',
                   dataType: 'json',
                   success: function(data){
                   	console.log(data)
                   	   $('select[name="schedule"]').empty();
                   	   $.each(data, function(key, value){
                   	   	$('select[name="schedule"]').append('<option value="'+key+'">'+ value +'</option>');
                   	   });
                   }
                });
            } else {
                $('select[name="schedule"]').empty();
            }
        });
	});
</script>