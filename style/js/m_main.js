$(document).ready(function(){
	
	//khi click order san pham không có món ăn thêm
	$('.appends').on('click',function(){
		$(this).children('.note_ones').css('display','block');
		
		$('.opacity-body').css('display','block');
		return false;		
	})


	//khi nhan button note order không ăn thêm
	$('.note-ok').on('click',function(){
		
		var parentsb=$(this).closest('.appends');
	 	$(parentsb).children('.note_ones').css('display','none');
	 	var parentnote=$(this).closest('.note_ones');
		var idSP=$(this).attr('idSP');
		var note=$(parentnote).children('.note-text').val();
		$.ajax({	
				type:'POST',
				url:'index.php?mod=j_add',
				data:{idSP:idSP,note:note},
				success:function(hn){
					$('.sum_total').html(hn + '' + ICONPRICE);
					$('.opacity-body').css('display','none');
					$.ajax({
						type:'POST',
						url:"index.php?mod=j_totaldishis",
						success:function(sms){
							$('.total_dishis').html(sms);
						}
					})
				}
		}) ;return false;
		 	
	})



	$('.redirect-cart').on('click',function(){
			window.location="index.php?mod=m/cart";
	})

	/*$('.notorder-cartnow').click(function(){
			$('#signup').css('display','block');
			$('.opacity-body').css('display','block');
	})
	

	$('.cancel-orderminmax').on('click',function(){
		$('.orderminmax').css("display",'none');
			$('.opacity-body').css('display','none');
	})*/



	/*** Login * ********/
	$('.action-login').click(function(){
		$('#signup').css('display','block');
		$('.opacity-body').css('display','block');
	})

	$('.cancel').click(function(){
		$('#signup').css('display','none');
		$('.opacity-body').css('display','none');
	})

	
	$('#sm-login').submit(function(e){
		var email=$('#login-email').val();
		var password=$('#login-password').val();
		var datas={"email":email,"password":password};
		$.ajax({
			type:'POST',
			url:'index.php?mod=j_checklogin',
			data:datas,
			success:function(sms){
				if(sms=='1' || sms==1 ) {location.reload();}
				else {alert(SGERROR);}
			}
			
		})
		e.preventDefault();
	})

	$('.orderfirst').on('click',function(){
		$('.orderminmaxs').css("display",'none');
		$('.opacity-body').css('display','none');
	});

	$('.seeit').on('click',function(){
		$('.orderminmaxs').css("display",'none');
		$('.indextopfoot4').css("display",'none');
		$('.beilage-click').css("display",'none');
		$('.opacity-body').css('display','none');
		
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
		var email=$('#email-forget').val();
		$.ajax({
			type:"POST",
			url:"index.php?mod=j_sendmail",
			data:{email:email},
			success:function(sms){
				if(sms==1 || sms=='1'){ alert(FGSUCCESS);}
				else {alert(FGERROR);}
			}

		})
		e.preventDefault();
	})

});