$(document).ready(function(){
	$('.getstressold').on('click',function() {
		var stressold=$('#rg_stress').attr("valueold");
		var stress=$('#rg_stress').val();
		$('#rg_stress').attr("valueold",stress);
		$('#rg_stress').val(stressold);
	});


	$('#rg_postalcode').autocomplete({
        source: function( request, response ) {
            $.ajax({
                url:"index.php?mod=j_getpostal",
                type: 'POST',
                data: "key=" + request.term,
                success: function(datas) {
                    var data = jQuery.parseJSON(datas);
                    response(data);         
                }
            })
        }
    });

     $('#rg_postalcode').blur(function(){
    	var postal=$('#rg_postalcode').val();
    	$.ajax({
    		type:'POST',
    		url:"index.php?mod=j_getregion",
    		data:"postal=" + postal,
    		success:function(sms){
    			$('#rg_region').val(''+sms);
    		}
    	})
    })

   $('#rg_stress').autocomplete({

    	source:function(request,response){
    		var postal=$('#rg_postalcode').val();
    		$.ajax({
    			url:"index.php?mod=j_getstress",
    			type:"POST",
    			data:{postal:postal,stress:request.term},
    			success:function(sms){
	    			//alert(sms);
	    			var data=jQuery.parseJSON(sms);
	    			response(data);	
    			}
    		})
    	}
    })
});