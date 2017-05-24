$(document).ready(function(){
	/* Chon nhom mon an*/
	$('.cat-menu a').click(function(){
		var NameGruppe=$(this).attr('NameGruppe');
		var NameURL=$(this).attr('img');
		var gruppe=$(this).html();
		var datas={"namegruppe":NameGruppe};
		$('.cat-menu li').removeAttr('id');
		$(this).closest('li').attr('id','menu_active');
		$.ajax({
			type:'POST',
			url:"index.php?mod=loaddishes",
			data:datas,
			success:function(sms){
				$('.dishes').html(sms);
				if($('ul.views > li .grid').parent('li').hasClass('selected')) {
					$('ul.views > li  .list').trigger( "click" );
					$('ul.views > li  .grid').trigger( "click" );
				}
				if($('ul.views > li .detail').parent('li').hasClass('selected')) {
					$('ul.views > li  .list').trigger( "click" );
					$('ul.views > li  .detail').trigger( "click" );
				}
				if($('ul.views > li .list').parent('li').hasClass('selected')) {
					$('ul.views > li  .detail').trigger( "click" );
					$('ul.views > li  .list').trigger( "click" );
				}
				
				
				$('.image_group_top img').attr("src",NameURL);
				$('#hide_category button').html(show_menu_txt);
				
				if(check_menu==1){
					$('#mobile_category').css('display','none');
					$('#hide_category button').css('-webkit-transform','rotate(90deg)');
					$('#hide_category button').css('-moz-transform','rotate(90deg)');
					$('#hide_category button').css('-ms-transform','rotate(90deg)');
					$('#hide_category button').css('-o-transform','rotate(90deg)');
					$('#hide_category button').css('margin-left','-27px');
					$('#hide_category button').css('padding-left','18px');
					check_menu=0;
				}
				
			}
		})

		return false;
	})

	//$('.cat-menu a:eq(2)').trigger('click');

	/* Hien thi popup san pham chi tiet o trang main*/
	
	// $('#popupcart').on('click',function(){
	// 	var stt=$(this).attr('stt');
	// 	if(stt==0){
	// 		$('#giohangcart').css('display','block');
	// 		$(this).attr('stt','1');
	// 		$('#popupcart  h3').html('Hide Cart');
	// 	}
	// 	else{
	// 		$('#giohangcart').css('display','none');
	// 		$(this).attr('stt','0');
	// 		$('#popupcart  h3').html('Show Cart');
	// 	}
	// 	return false;
	// })

	/* Tat popup het gio*/
	$('.form_close_time').on('click',function(){
		$('.form-box-overlay2').css('display','none');
	})
})

