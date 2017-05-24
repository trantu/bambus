$(document).ready(function(){
	$('#info_email').blur(function(){
		var email=$(this).val();
		$.ajax({
			url: 'index.php?mod=j_checkemail',
			type: 'POST',
			data: {email: email},
			success:function(sms){
				if(sms==1 || sms=='1'){
					$('.errorrepass').html(email_isset);
					$('#payment-paypal').hide();
				}
				else {
					$('.errorrepass').html('');
					$('#payment-paypal').show();
				}
			}
		})
	})

	$('#info_repassword').blur(function(){
		var password=$('#info_password').val();
		var repassword=$('#info_repassword').val();
		if(password!=repassword){
			$('.errorrepass').html(repassword_false);
			$('#payment-paypal').hide();
		}
		else {
			$('.errorrepass').html('');
			$('#payment-paypal').show();
		}
	})

	
// Xử lý chỉ nhập số cho Postal Code
$("#info_postalcode").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

// Autocomplete cho postal code
$('#info_postalcode').autocomplete({
        source: function( request, response ) {
            $.ajax({
                url:"index.php?mod=j_getpostal",
                type: 'POST',
                data: "key=" + request.term,
                success: function(datas) {
                    //alert(datas);
                    console.log(datas);
                    var data = $.parseJSON(datas);
                    console.log(data);
                    response(data);         
                }
            })
        }
    });
    
 $('#info_postalcode').blur(function(){
    	var postal=$('#info_postalcode').val();
    	$.ajax({
    		type:'POST',
    		url:"index.php?mod=j_getregion",
    		data:"postal=" + postal,
    		success:function(sms){
    			$('#info_region').val(''+sms);
    		}
    	})
    });

    $('#info_stress').autocomplete({
    	source:function(request,response){
    		var postal=$('#info_postalcode').val();
    		$.ajax({
    			url:"index.php?mod=j_getstress",
    			type:"POST",
    			data:{postal:postal,stress:request.term},
    			success:function(sms){
	    			//alert(sms);
	    			var data=$.parseJSON(sms);
	    			response(data);	
    			}
    		})
    	}
    });






})