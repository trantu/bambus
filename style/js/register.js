$(document).ready(function(){
	$('.cancel-resgister').click(function(){
		$('#pp-register').css("display",'none');
		$('.opacity-body').css('display','none');
		$('#pp-info-user').css('display','none');
		
	})

	$('#rg_email').blur(function(){
		var email=$(this).val();
		$.ajax({
			url: 'index.php?mod=j_checkemail',
			type: 'POST',
			data: {email: email},
			success:function(sms){
				if(sms==1 || sms=='1'){
					$('.erroremail').html(errormail);
					$('.sm-register').hide();
				}
				
				else {
					$('.erroremail').html('');
					$('.sm-register').show();
				}
			}
		})
		
	})

	$('#rg_repassword').blur(function(){
		var password=$('#rg_password').val();
		var repassword=$('#rg_repassword').val();
		if(password!=repassword){
			$('.errorrepass').html(errorrepass);
			$('.sm-register').hide();
		}
		else {
			$('.errorrepass').html('');
			$('.sm-register').show();
		}
	})

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


   //dang ky user
   $('#fr-register').submit(function(e){
   		$('.successful').css('display','none');
   		var email=$('#rg_email').val();
   		var password=$('#rg_password').val();
   		var firstname=$('#rg_firstname').val();
   		var lastname=$('#rg_lastname').val();
   		var sex=$('input[name=sex]:checked', '#fr-register').val();
   		var postalcode=$('#rg_postalcode').val();
   		var office=$('#rg_office').val();
   		var numberhouse=$('#rg_numberhouse').val();
   		var noteposition=$('#rg_noteposition').val();
   		var stress=$('#rg_stress').val();
   		var region=$('#rg_region').val();
   		var company=$('#rg_company').val();
   		var phone=$('#rg_phone').val();
   		var note=$('#rg_note').val();
   		var datas={'email':email,'password':password,'firstname':firstname,'lastname':lastname,'sex':sex,
	   		'postalcode':postalcode,'office':office,'numberhouse':numberhouse,'noteposition':noteposition,
	   		'stress':stress,'region':region,'company':company,'phone':phone,'note':note
	   	};

	   	$.ajax({
	   		type:'POST',
	   		url:"index.php?mod=register",
	   		data:datas,
	   		success:function(sms){
	   			if(sms==1 || sms=='1'){	
	   				$('.successful').css('display','block');
	   			}
	   			else { alert(errorregister);}
	   		}
	   	})	
	   	e.preventDefault();
   })

	
	//dang ky user
   $('#fr-infouse').submit(function(e){
   		$('.successful').css('display','none');
   		var email=$('#info_email').val();
   		var password=$('#info_password').val();
   		var firstname=$('#info_firstname').val();
   		var lastname=$('#info_lastname').val();
   		var sex=$('input[name=sex]:checked', '#fr-infouse').val();
   		var postalcode=$('#info_postalcode').val();
   		var office=$('#info_office').val();
   		var numberhouse=$('#info_numberhouse').val();
   		var noteposition=$('#info_noteposition').val();
   		var stress=$('#info_stress').val();
   		var region=$('#info_region').val();
   		var company=$('#info_company').val();
   		var phone=$('#info_phone').val();
   		var note=$('#info_note').val();
   		var datas={'email':email,'password':password,'firstname':firstname,'lastname':lastname,'sex':sex,
	   		'postalcode':postalcode,'office':office,'numberhouse':numberhouse,'noteposition':noteposition,
	   		'stress':stress,'region':region,'company':company,'phone':phone,'note':note
	   	};

	   	$.ajax({
	   		type:'POST',
	   		url:"index.php?mod=j_update_user",
	   		data:datas,
	   		success:function(sms){
	   			if(sms==1 || sms=='1'){	
	   				$('.successful_user').css('display','block');
	   			}
	   			else { alert(errorregister);}
	   		}
	   	})	
	   	e.preventDefault();
   })


	$('.regis-login').click(function(){
		$('#pp-register').css("display",'none');
		$('#signup').css('display','block');
		
	})

})