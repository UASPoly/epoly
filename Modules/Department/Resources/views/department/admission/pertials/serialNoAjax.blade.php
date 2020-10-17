<script type="text/javascript">
	$(document).ready(function(){
        $('select[name="programme"]').on('change',function(){
            var programme = $(this).val();
            var programme = document.getElementById('schedule');
            var e = document.getElementById('serial_no')
            console.log(programme);
            $.ajax({
                url: '/core/ajax/programme/'+programme+'/schedule/'+schedule+/'get-counter',
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    $('select[name="schedule"]').empty();
                    $.each(data, function(key, value){
                        e.innerHTML = "<input type='text' name='serial_no' class='form-control add-input' placeholder='staffId' value="+value+"/>";
                    });
                }
            });
           
        });
	});
</script>