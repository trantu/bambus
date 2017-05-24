$(document).ready(function(){
	if(chosedefault==1){
		$('.infoheader-us').css("background-image","none");
		$('.infoheader-us').css("background-color","green");
		$('#fr-register').css('display','block');
		$('#table-historys').css('display','none');
	}
	else {
		$('.infoheader-or').css("background-image","none");
		$('.infoheader-or').css("background-color","green");
		$('#fr-register').css('display','none');
		$('#table-historys').css('display','block');
	}
	
	$('.infouser-his').on('click',function(){
		$('.infoheader-or').css("background-color","#e5e5e5");
		$('#fr-register').css('display','block');
		$('#table-historys').css('display','none');
		$('.infoheader-us').css("background-image","none");
		$('.infoheader-us').css("background-color","green");
		return false;
	})

	$('.orderouser-his').on('click',function(){
		$('.infoheader-us').css("background-color","#e5e5e5");
		$('#fr-register').css('display','none');
		$('#table-historys').css('display','block');
		$('.infoheader-or').css("background-image","none");
		$('.infoheader-or').css("background-color","green");
		return false;
	})


	/***** Delete ***** **/
	$('.delete_order').on('click',function(){
		var idDH=$(this).attr("idDH");
		$.ajax({
			type:"POST",
			url:"index.php?mod=delete_hisorder",
			data:"idDH=" + idDH,
			success:function(sms){
				$('#table-history').html(sms);
			}
		})
		return false;
	});

	$('.action-logins').on('click',function(){
		$('.opacity-body').css("display","block");
		$('#signup').css("display","block");
	})

	$('.cancel-sign').click(function(){
		$('.opacity-body').css("display","none");
		$('#signup').css("display","none");
	})

	$('#sm-login').on('submit',function(e){
		$('.cpasserror').html("");
		var password_new=$('#password_new').val();
		var cpassword_new=$('#cpassword_new').val();
		var password_old=$('#password_old').val();
		if(password_new!=cpassword_new){
			$('.cpasserror').html(CPCFPASSS);
			return false;
		}
		else {
			var datas={"password_new":password_new,"password_old":password_old};
			$.ajax({
				type:"POST",
				url:"index.php?mod=j_changepass",
				data:datas,
				success:function(sms){
					if(sms==0 || sms=="0"){
						$('.resultmail').html(CPERRORDB);
					}
					if(sms==1 || sms=='1'){
						$('.resultmail').html(CPISSETPAS);
					}
					else { $('.resultmail').html(CPSUCCESS); }
				}

			})

		}
		
		e.preventDefault();
	})
})