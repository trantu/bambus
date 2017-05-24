$(document).ready(function(){
	$('#address').autocomplete({
		source:function(request,response){
			$.ajax({
                url:"index.php?mod=get_addresses",
                type: 'POST',
                data: "address=" + request.term,
                success: function(datasv) {
                    var datam = jQuery.parseJSON(datasv);
                    response(datam);         
                }
            })
		}

	})  
})