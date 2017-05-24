$(document).ready(function(){
	//hien từ điển cho input
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

		//lấy vùng theo mã bưu điện
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
	    			var data=jQuery.parseJSON(sms);
	    			response(data);	
    			}
    		})
    	}
    })



    $('.goto_order_now').click(function(){
        var info_postalcode=$('#rg_postalcode').val();
        var info_stress=$('#rg_stress').val();
        var info_region=$('#rg_region').val();
        var stress=info_postalcode + ' '+ info_stress + ' '+ info_region;
        
        $.post(
           'index.php?mod=j_priceorder',
           {address : stress},  
           function(result){ 
                window.location="index.php?mod=m/main";
           }
        );

    })

})