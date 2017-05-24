$(document).ready(function(){
	/*** Login * ********/
	$('.action-login').click(function(){
		$('#signup').css('display','block');
		$('.opacity-body').css('display','block');
	})

	$('.cancel').click(function(){
		$('#signup').css('display','none');
		$('.opacity-body').css('display','none');
	})

	//click login
	$('#sm-login').submit(function(e){
		var email=$('#login-email').val();
		var password=$('#login-password').val();
		var datas={"email":email,"password":password};
		$.ajax({
			type:'POST',
			url:'index.php?mod=j_checklogin',
			data:datas,
			success:function(sms){
				if(sms=='1' || sms==1 ) {window.location="index.php?mod=m/info_user";}
				else {alert(SGERROR);}
			}
			
		})

		e.preventDefault();
	})



	//hien popup quen password
	$('.forget-pass').click(function(){
		$('.formpassword').css("display","block");
		$('#signup').css('display','none');
		$('.opacity-body').css('display','block');
	})

	$('.cancel-forget').click(function(){
		$('.formpassword').css("display","none");
		$('.opacity-body').css('display','none');
	})

	$('#form-forgetpass').submit(function(e){
		$('.opacity-body').css('display','block');
		$('.opacity-body').css('z-index','1000');
		 $('.opacity-body').html('<img style=" position: absolute; margin: auto;top: 0; left: 0;right: 0;bottom: 0;" src="upload/ajax-loader.gif"> loading...');
		var email=$('#email-forget').val();
		$.ajax({
			type:"POST",
			url:"index.php?mod=j_sendmail",
			data:{email:email},
			success:function(sms){
				if(sms==1 || sms=='1'){ alert(FGSUCCESS);}
				else {alert(FGERROR);}
				 $('.opacity-body').html('');
				 $('.opacity-body').css('z-index','998');
				 $('.opacity-body').css('display','none');
			}

		})
		e.preventDefault();
	})



})