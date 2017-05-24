$(document).ready(function(){
	$('.zur').click(function(){
		var pricenow=$('.sum_total').text();
		var sum=parseFloat(pricenow);
		if(PRICEMIN > sum){

			$('.orderminmax').css("display",'block');
			$('.opacity-body').css('display','block');
		}

		else{
			window.location="index.php?mod=m/orderdetail";
		}
		
		return false;
	})

	$('.cancel-orderminmax').on('click',function(){
		$('.orderminmax').css("display",'none');
		$('.opacity-body').css('display','none');
		return false;
	})

})	
	