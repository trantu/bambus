$(document).ready(function(){
	
	$('#hide_category').on('click',function(){
		if(check_menu==0){
			$('#hide_category button').html(show_menu_txt);
			$('#mobile_category').css('display','block');
			$('#hide_category button').css('-webkit-transform','rotate(0deg)');
			$('#hide_category button').css('-moz-transform','rotate(0deg)');
			$('#hide_category button').css('-ms-transform','rotate(0deg)');
			$('#hide_category button').css('-o-transform','rotate(0deg)');
			$('#hide_category button').css('margin-left','1em');
			$('#hide_category button').css('padding-left','1em');
			check_menu=1;
		}
		else{
			$('#hide_category button').html(hide_menu_txt);
			$('#mobile_category').css('display','none');
			$('#hide_category button').css('-webkit-transform','rotate(90deg)');
			$('#hide_category button').css('-moz-transform','rotate(90deg)');
			$('#hide_category button').css('-ms-transform','rotate(90deg)');
			$('#hide_category button').css('-o-transform','rotate(90deg)');
			$('#hide_category button').css('margin-left','-27px');
			$('#hide_category button').css('padding-left','18px');
			check_menu=0;
		}
	})

$('#hide_cart_in').on('click',function(){
		if(cart_in==0){
			$('#hide_cart_in button').html(hide_cart_txt);
			$('#mobile_cart').css('display','block');
			$('#hide_cart_in button').css('-webkit-transform','rotate(0deg)');
			$('#hide_cart_in button').css('-moz-transform','rotate(0deg)');
			$('#hide_cart_in button').css('-ms-transform','rotate(0deg)');
			$('#hide_cart_in button').css('-o-transform','rotate(0deg)');
			$('#hide_cart_in button').css('margin-right','1em');
			$('#hide_cart_in button').css('padding-left','18px');
			cart_in=1;
		}
		else{
			$('#hide_cart_in button').html(show_cart_txt);
			$('#mobile_cart').css('display','none');
			$('#hide_cart_in button').css('-webkit-transform','rotate(90deg)');
			$('#hide_cart_in button').css('-moz-transform','rotate(90deg)');
			$('#hide_cart_in button').css('-ms-transform','rotate(90deg)');
			$('#hide_cart_in button').css('-o-transform','rotate(90deg)');
			$('#hide_cart_in button').css('margin-right','-26px');
			$('#hide_cart_in button').css('padding-left','18px');
			cart_in=0;
		}
	})

	// $('#hide_cart_in').on('click',function(){
	// 	if(cart_in==0){
	// 		$('#hide_cart_in button').html(hide_cart_txt);
	// 		$('#mobile_cart').css('display','block');
	// 		cart_in=1;
	// 	}
	// 	else{
	// 		$('#hide_cart_in button').html(show_cart_txt);
	// 		$('#mobile_cart').css('display','none');
	// 		cart_in=0;
	// 	}
	// })


})