$(document).ready(function(){
	var is=0;

	//bấm button login khi nhập dữ liệu xong page home
	$('#sm-login_home').submit(function(e){
		$('.form-box-overlay').css('z-index','999999');
		$('.form-box-overlay').html('<img style=" position: absolute; margin: auto;top: 0; left: 0;right: 0;bottom: 0;" src="upload/ajax-loader.gif"> loading...');
		var email=$('#login-email').val();
		var password=$('#login-password').val();
		var cookie=0;
		if ($('#login_remember').is(":checked")){
			cookie=1;
		}
		//xu ly sau cookie
		var datas={"email":email,"password":password};
		$.ajax({
			type:'POST',
			url:'index.php?mod=j_checklogin',
			data:datas,
			success:function(sms){
				if(sms=='1' || sms==1){
					$('#login').html('<a href="index.php?mod=p_infouser"> My Account </a>|<p><a href="index.php?mod=logout">Logout</a></p>');
					$('.form-box.login').fadeOut(600);
					//lấy dữ liệu user
					$.post(
                       'index.php?mod=j_getinfouser',
                       {email : email},  
                       function(result){ 
                          var data_rs=result.info;
                          //console.log(data_rs);
	                      $('#info_postalcode').val(''+data_rs.Postalcode);
	                      $('#info_numberhouse').val(''+data_rs.Numberhouse);
	                      $('#info_stress').val(''+data_rs.Stress);
	                      $('#info_region').val(''+data_rs.Region);
                       },
                       'json'
               		);

					$('.form-box.getaddressorder').fadeIn(600);
					$('.form-box-overlay').css('z-index','9999');
					$('.form-box-overlay').html('');
					//$('.form-box-overlay').fadeOut(600);
					is++;
				}
				else {alert(error_login);$('.form-box-overlay').css('z-index','9999');
					$('.form-box-overlay').html('');}
			}
			
		})
		e.preventDefault();
	})


	// reset password khi quên
	$('#reset-form').submit(function(e){
		$('.form-box-overlay').css('z-index','999999');
		$('.form-box-overlay').html('<img style=" position: absolute; margin: auto;top: 0; left: 0;right: 0;bottom: 0;" src="upload/ajax-loader.gif"> loading...');
		var email=$('#reset_email').val();
		$.ajax({
			url: 'index.php?mod=j_checkemail',
			type: 'POST',
			data: {email: email},
			success:function(sms){ // Nếu mail này tồn tại thì gửi
				if(sms==1 || sms=='1')
				{
							$.ajax({
								type:"POST",
								url:"index.php?mod=j_sendmail",
								data:{email:email},
								success:function(sms){
									if(sms==1 || sms=='1'){ 
									 alert(forget_success);
									 $('.form-box-overlay').css('z-index','9999');
									}
									else 
										{
											alert(error_fg_mail); $('.form-box-overlay').css('z-index','9999');
										}
								}

							})
				}
				else 
				{
					
					alert(mail_not_register); $('.form-box-overlay').css('z-index','9999');
					return false;
				}
			}
		})
		e.preventDefault();
	})


	//submit form chap nhan dia chi dang nhap
	$('#address_form_order').submit(function(e){
		$('.form-box-overlay').css('z-index','999999');
		$('.form-box-overlay').html('<img style=" position: absolute; margin: auto;top: 0; left: 0;right: 0;bottom: 0;" src="upload/ajax-loader.gif"> loading...');
		var postalcode=$('#info_postalcode').val();
	    var numberhouse=$('#info_numberhouse').val();
	    var stress=$('#info_stress').val();
	    var region=$('#info_region').val();
	    var datas={postalcode:postalcode,numberhouse:numberhouse,stress:stress,region:region};
	    $.ajax({
	    	method:'post',
	    	url:'index.php?mod=j_update_user_address',
	    	data:datas,
	    	success:function(sms){
	    		if(sms==0 || sms=='0'){
	    			alert(error_login);
	    		}
	    		else{
	    			location.reload();
	    			$('.form-box.getaddressorder').fadeOut(600);
	    			$('.form-box-overlay').fadeOut(600);
	    		}
	    		
	    		$('.form-box-overlay').css('z-index','9999');
				$('.form-box-overlay').html('');
	    	}
	    })
		e.preventDefault();
	})
	
})