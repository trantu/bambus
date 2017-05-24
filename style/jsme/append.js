$(document).ready(function(){

	//khi click vao thêm món ăn không có ăn thêm click nút add cart
	/*$('.appendsall').click(function(){
		$(this).parent().children('.note_ones').css('display','block');
		$('.form-box-overlay').css('display','block');	
		return false;
	});*/
		
	//khi click vao thêm món ăn không có ăn thêm.click cả hàng 
	$('.root_append_notbeilage').click(function(){
		$(this).children('.note_ones').css('display','block');
		$('.form-box-overlay').css('display','block');	
		return false;
	});

	/***Button note mon an order mon an khong co an them **/
	$('.note-ok').on('click',function(){
		var parentsb=$(this).closest('.root_append');
		var idSP=$(this).attr('idSP');
		var note=$(parentsb).find('.note-text').val();
		$.ajax({	
			type:'POST',
			url:'index.php?mod=j_add',
			data:{idSP:idSP,note:note},
			success:function(hn){
				$('.sum_total').html(hn + '' + ICONPRICE);
				$.ajax({
					type:'POST',
					url:"index.php?mod=j_totaldishis",
					success:function(sms){
						$(parentsb).find('.note_ones').css('display','none');
						$('.total_dishis').html(sms);
						$.ajax({    
		                    type:'POST',
		                    url: "index.php?mod=j_showcart",
		                    data:'idSP='+ idSP,
		                    success:function(smgs){
		                        $('.form-box-overlay').css('display','none'); 
		                        if($.isNumeric(smgs)==true){    
		                            var sl=$('.quantity'+idSP).eq(-1).text();
		                            sl=parseInt(sl);
		                            var quantt=sl + 1;
		                            var total_price1=(quantt*smgs).toFixed(2);
		                            total_price1=total_price1.replace('.',',');
		                            $('.price'+idSP).eq(-1).html(total_price1 + '' + ICONPRICE);
		                            $('.quantity'+idSP).eq(-1).html(quantt);
		                        }
		                        else{
		                            $('#order_summary').append(smgs);
		                        }

		                        $('.form-box-overlay').css('display','none'); 
		                    }
		                })
					}
				})
			}
		}) ;return false;
	});


})	
