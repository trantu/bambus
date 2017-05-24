$(document).ready(function(){
	var is=0;
	$('.action-login').click(function(){
		$('#signup').css('display','block');
		$('.opacity-body').css('display','block');
	})

	$('.cancel').click(function(){
		$('#signup').css('display','none');
		$('.opacity-body').css('display','none');
	})


	$('.notorder-cartnow').click(function(){
		if(is>0){
			var pricenow=$('.sum_total').text();
			var pr=pricenow.replace(',','+');
			pr=pr.replace('.','');
			pr=pr.replace('+','.');
			var sum=parseFloat(pr);
			if(pricemin > sum){
				$('.orderminmax').css("display",'block');
				$('.opacity-body').css('display','block');
			}
			else{
				$.ajax({
					url: 'index.php?mod=create_sessionnewcart',
					type: 'POST',
					success:function(sms){
						window.location="index.php?mod=orderdetail";
					}
				})	
			}
			return false;
		}
		else{
			var pricenow=$('.sum_total').text();
			var pr=pricenow.replace(',','+');
			pr=pr.replace('.','');
			pr=pr.replace('+','.');
			var sum=parseFloat(pr);
			if(pricemin > sum){
				$('.orderminmax').css("display",'block');
				$('.opacity-body').css('display','block');
			}
			else{
				$('#signup').css('display','block');
				$('.opacity-body').css('display','block');
			}
		}
	
	})


	$('.order-cartnow').click(function(){

		var pricenow=$('.sum_total').text();
		var pr=pricenow.replace(',','+');
		pr=pr.replace('.','');
		pr=pr.replace('+','.');
		var sum=parseFloat(pr);
		if(pricemin > sum){
			$('.orderminmax').css("display",'block');
			$('.opacity-body').css('display','block');
		}
		else{
			$.ajax({
					url: 'index.php?mod=create_sessionnewcart',
					type: 'POST',
					success:function(sms){
						window.location="index.php?mod=orderdetail";
					}
				})
		}
		return false;
	})

	//bấm button login khi nhập dữ liệu xong page main
	$('#sm-login').submit(function(e){
		var email=$('#login-email').val();
		var password=$('#login-password').val();
		var datas={"email":email,"password":password};
		$.ajax({
			type:'POST',
			url:'index.php?mod=j_checklogin',
			data:datas,
			success:function(sms){
				if(sms=='1' || sms==1 ) {
					$('.login').load("index.php?mod=login_success");
					$('#signup').css('display','none');
					$('.opacity-body').css('display','none');
					$('#notorder-cartnows').removeClass('notorder-cartnow');
					$('#notorder-cartnows').addClass('order-cartnow');
					is++;
				}
				else {alert(sgerror);}
			}
			
		})
		e.preventDefault();
	})


	//bấm button login khi nhập dữ liệu xong page home
	$('#sm-login_home').submit(function(e){
		var email=$('#login-email').val();
		var password=$('#login-password').val();
		var datas={"email":email,"password":password};
		$.ajax({
			type:'POST',
			url:'index.php?mod=j_checklogin',
			data:datas,
			success:function(sms){
				if(sms=='1' || sms==1 ) {
					//$('.login').load("index.php?mod=login_success");

					$('#pp-info-user').css('display','block');
					$('#signup').css('display','none');
					//lấy dữ liệu user
					$.post(
                       'index.php?mod=j_getinfouser',
                       {email : email},  
                       function(result){ 
                         var data_rs=result.info;

                          $('#info_email').val(''+data_rs.Email);
                          $('#info_firstname').val(''+data_rs.Firstname);
                          $('#info_lastname').val(''+data_rs.Lastname);
                          $('#info_postalcode').val(''+data_rs.Postalcode);
                          $('#info_office').val(''+data_rs.Office);
                          $('#info_numberhouse').val(''+data_rs.Numberhouse);
                          if(data_rs.Sex==1 && data_rs.Sex=='1'){
                          	$('#male_sex').prop('checked',true);
                          }
                          else{
							$('#female_sex').prop('checked',true);
                          }
                          $('#info_noteposition').val(''+data_rs.Noteposition);
                          $('#info_stress').val(''+data_rs.Stress);
                          $('#info_region').val(''+data_rs.Region);
                          $('#info_company').val(''+data_rs.Company);
                          $('#info_phone').val(''+data_rs.Phone);
                          $('#info_note').val(''+data_rs.Note);
                       },
                       'json'
               		);

					is++;	
				}
				else {alert(sgerror);}
			}
			
		})
		e.preventDefault();
	})



	$('.action-logins').click(function(){
		$('.action-user').css('display','block');
	})

	$('.ins-popupregister').click(function(){
		$('#signup').css('display','none');
		$('#pp-register').css("display",'block');
		$('.opacity-body').css('display','block');
	})

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
				if(sms==1 || sms=='1'){ alert(fgsucess);}
				else {alert(fgerror);}
				$('.opacity-body').html('');
				$('.opacity-body').css('z-index','4');
				$('.opacity-body').css('display','none');
			}

		})
		e.preventDefault();
	})


	$('.sm-goto-order').click(function(){
		var info_postalcode=$('#info_postalcode').val();
		var info_stress=$('#info_stress').val();
		var info_region=$('#info_region').val();
		var stress=info_postalcode + ' '+ info_stress + ' '+ info_region;
		
	  	$.post(
           'index.php?mod=j_priceorder',
           {address : stress},  
           function(result){ 
            	window.location="index.php?mod=main";
           }
   		);

	})
	
})