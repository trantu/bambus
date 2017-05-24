	/***Button note mon an order mon an khong co an them **/
	$('.root_append_notbeilage').on('click',function(){
		$('.form-box-overlay').css('z-index','999999');
		$('.form-box-overlay').css('opacity','0.1');
		$('.form-box-overlay').css('display','block');
		$('.form-box-overlay').html('<img style=" position: absolute; margin: auto;top: 0; left: 0;right: 0;bottom: 0;" src="upload/ajax-loader.gif"> loading...'); 
		var parentsb=$(this);
		var idSP=$(this).attr('idSP');
		var note='';
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
						$('.total_dishis').html(sms);
						$.ajax({    
		                    type:'POST',
		                    url: "index.php?mod=j_showcart",
		                    data:'idSP='+ idSP,
		                    success:function(smgs){
		                        if($.isNumeric(smgs)==true){    
		                            var sl=$('.quantity'+idSP).eq(-1).text();
		                            sl=parseInt(sl);
		                            var quantt=sl + 1;
		                            var total_price1=(quantt*smgs).toFixed(2);
		                            total_price1=total_price1.replace('.',',');
		                            $('.price'+idSP).eq(-1).html(ICONPRICE + '' + total_price1);
		                            $('.quantity'+idSP).eq(-1).html(quantt);
		                        }
		                        else{
		                            $('#order_summary').append(smgs);
		                        }
		                        $('.form-box-overlay').css('display','none');
		                        $('.form-box-overlay').css('z-index','9999');
		                        $('.form-box-overlay').css('opacity','1');
								$('.form-box-overlay').html(''); 
		                    }
		                })
					}
				})
			}
		}) ;return false;
	});


	//event khi node thay doi
	$('.note_change_idsp').on('click',function(){
		var parent_note_change=$(this).closest('form');
		var text_note=$(parent_note_change).find('.note-text').val();
		var idSP=$(this).attr('idsp');
		var $this_at=$(this);
		$.ajax({
			method:'POST',
			url:'index.php?mod=change_note',
			data:{idSP:idSP,note:text_note},
			success:function(sms){
				var datajs=$.parseJSON(sms);
				if(datajs.rs==1){
					$('.form-box-overlay').css('display','none');
					$(parent_note_change).closest('.note_ones').css('display','none');
					$this_at.attr('idsp',datajs.idSP);
					$this_at.closest('ul').find('li:first-child .append').attr('idsp',datajs.idSP);
					$this_at.closest('ul').find('li:first-child span').removeClass();
					$this_at.closest('ul').find('li:first-child span').attr('class','quantity' +datajs.idSP);
					$this_at.closest('ul').find('.licuoicung span').removeClass();
					$this_at.closest('ul').find('.licuoicung span').attr('class','price' +datajs.idSP);
					$this_at.closest('ul').find('li:first-child .remove').attr('idsp',datajs.idSP);
					//location.reload();	 	
				}else{
					location.reload();
				}
			}
		})
	
	})

	$('.remove_sp_total').on('click',function(){
        var idSP=$(this).attr('idSP');  
        var this_root=$(this);
        $.ajax({
            url:"index.php?mod=j_delete_idsp",
            type:"POST",
            data:{idSP:idSP},
            success:function(sms){
                var datas=$.parseJSON(sms);
                $('.sum_total').html(ICONPRICE + '' + datas.total);
                $('.total_dishis').html(datas.total_dishis);
                 $(this_root).closest('li').remove();
            }
        })
        return false;
   })



	//event shownode
	$('.shownote').on('click',function(){
		var parent_note=$(this).closest('li');
		$(parent_note).find('.note_ones').css('display','block');
		$('.form-box-overlay').css('display','block'); 
	})


	//function shownode
	function shownote(parent_notes){
		var parent_note=parent_notes;
		$(parent_note).find('.note_ones').css('display','block');
		$('.form-box-overlay').css('display','block'); 
	}


	//funtion khi node thay doi
	function note_change_idsp(parent_note_changes,text_notes,idSPs,this_atr){
		var parent_note_change=parent_note_changes;
		var text_note=text_notes;
		var idSP=idSPs;
		$.ajax({
			method:'POST',
			url:'index.php?mod=change_note',
			data:{idSP:idSP,note:text_note},
			success:function(sms){
				console.log(sms);
				var datajs=$.parseJSON(sms);
				console.log(datajs);
				if(datajs.rs==1){
					$('.form-box-overlay').css('display','none');
					$(parent_note_change).closest('.note_ones').css('display','none');
					this_atr.attr('idsp',datajs.idSP);
					this_atr.closest('ul').find('li:first-child .append').attr('idsp',datajs.idSP);
					this_atr.closest('ul').find('li:first-child span').removeClass();
					this_atr.closest('ul').find('li:first-child span').attr('class','quantity' +datajs.idSP);
					this_atr.closest('ul').find('.licuoicung span').removeClass();
					this_atr.closest('ul').find('.licuoicung span').attr('class','price' +datajs.idSP);
					this_atr.closest('ul').find('li:first-child .remove').attr('idsp',datajs.idSP);
					//location.reload();	
				}
				else{
					location.reload();
				}
 
			}
		})
	}

	//xoa item theo san pham.bấm dấu trừ (-) ben main.php
	function remove_item(idSP,STTPP,this_item,iconmoney,divdels,price){
		$('.form-box-overlay').css('z-index','999999');
		$('.form-box-overlay').css('opacity','0.1');
		$('.form-box-overlay').css('display','block');
		$('.form-box-overlay').html('<img style=" position: absolute; margin: auto;top: 0; left: 0;right: 0;bottom: 0;" src="upload/ajax-loader.gif"> loading...'); 
		var divdel=divdels;
		var idSP=idSP;
		var sttplus=STTPP;
		var $this=this_item;
		$.ajax({	
			type:'POST',
			url:'index.php?mod=j_delete',
			data:{idSP:idSP,stt:sttplus},
			success:function(smgs){
				$('.sum_total').html(iconmoney + ''+ smgs);
				var sosp_n=$('.total_dishis:first').text();
				sosp_n=parseInt(sosp_n);
				var sosp_tt=sosp_n-1;
				$('.total_dishis').html(sosp_tt);
				var parent_d=$this.closest('.removeabc');
				var sls=$(parent_d).find('.quantity'+idSP).text();
				sls=parseInt(sls);
				var slsnow=sls-1;
				if(slsnow>0){
					$(parent_d).find('.quantity'+ idSP).html(slsnow);
					var pr=slsnow;
					var pri_ce=price;
					pri_ce=pri_ce.replace(',','.');
					pri_ce=parseFloat(pri_ce);
					var prices=(pr*pri_ce).toFixed(2);
					var pricess=prices.replace('.',',');
					$(parent_d).find('.price'+ idSP).html(iconmoney + pricess);
				}
				if(slsnow==0) {
					divdel.remove();
					$.ajax({	
						type:'POST',
						url:'index.php?mod=j_deleteCarts',
						data:'idSP='+ idSP,
						success:function(smgss){}
					})	
				}
				$('.form-box-overlay').css('display','none');
                $('.form-box-overlay').css('z-index','9999');
                $('.form-box-overlay').css('opacity','1');
				$('.form-box-overlay').html(''); 
			}
		});return false;
	}


	//tăng item theo san phẩm.Bấm dấu cộng(+)  been main.php
	function add_item(idSP,STTPP,this_item,iconmoney,price){
		console.log(idSP);
		console.log(this_item);

		$('.form-box-overlay').css('z-index','999999');
		$('.form-box-overlay').css('opacity','0.1');
		$('.form-box-overlay').css('display','block');
		$('.form-box-overlay').html('<img style=" position: absolute; margin: auto;top: 0; left: 0;right: 0;bottom: 0;" src="upload/ajax-loader.gif"> loading...'); 
		var idSP=idSP;var sttplus=STTPP;
		var $this=this_item;
		$.ajax({	
			type:'POST',
			url:'index.php?mod=j_add',
			data:{idSP:idSP,stt:sttplus},
			success:function(smgs){
				$('.sum_total').html( iconmoney+''+smgs);
				var sosp_n=$('.total_dishis:first').text();
				sosp_n=parseInt(sosp_n);
				var sosp_tt=sosp_n+1;
				$('.total_dishis').html(sosp_tt);
				var parent_a=$this.closest('.removeabc');					
				var sls=$(parent_a).find('.quantity'+ idSP).text();
				sls=parseInt(sls);
				var slsnow=sls+1;
				$(parent_a).find('.quantity'+idSP).html(slsnow);
				var pr=slsnow;
				var pri_ce=price;
				pri_ce=pri_ce.replace(',','.');
				pri_ce=parseFloat(pri_ce);
				var prices=(pr*pri_ce).toFixed(2);
				var pricess=prices.replace('.',',');
				$(parent_a).find('.price'+idSP).html( iconmoney+'' +pricess);
				
				$('.form-box-overlay').css('display','none');
                $('.form-box-overlay').css('z-index','9999');
                $('.form-box-overlay').css('opacity','1');
				$('.form-box-overlay').html(''); 			
			}
		});

		return false; 

	}


	//tăng item theo san phẩm.Bấm dấu cộng(nut len)  bên checkout.tpl
	function add_item_cart(idSP,STTPP,this_item,iconmoney,price){
		$('.form-box-overlay').css('z-index','999999');
		$('.form-box-overlay').css('opacity','0.1');
		$('.form-box-overlay').css('display','block');
		$('.form-box-overlay').html('<img style=" position: absolute; margin: auto;top: 0; left: 0;right: 0;bottom: 0;" src="upload/ajax-loader.gif"> loading...'); 
		var idSP=idSP;var sttplus=STTPP;
		var $this=this_item;
		$.ajax({	
			type:'POST',
			url:'index.php?mod=j_add',
			data:{idSP:idSP,stt:sttplus},
			success:function(smgs){
				$('.sum_total').html( iconmoney+''+smgs);
				var sosp_n=$('.total_dishis:first').text();
				sosp_n=parseInt(sosp_n);
				var sosp_tt=sosp_n+1;
				$('.total_dishis').html(sosp_tt);
				var parent_a=$this.closest('.quantity');					
				var sls=$(parent_a).find('.quantity'+ idSP).text();
				sls=parseInt(sls);
				var slsnow=sls+1;
				$(parent_a).find('.quantity'+idSP).html(slsnow);
				var pr=slsnow;
				var pri_ce=price;
				pri_ce=pri_ce.replace(',','.');
				pri_ce=parseFloat(pri_ce);
				var prices=(pr*pri_ce).toFixed(2);
				var pricess=prices.replace('.',',');
				$(parent_a).parent().find('.price'+idSP).html( iconmoney+'' +pricess);

				
				$('.form-box-overlay').css('display','none');
                $('.form-box-overlay').css('z-index','9999');
                $('.form-box-overlay').css('opacity','1');
				$('.form-box-overlay').html(''); 			
			}
		});

		return false; 

	}

	//xoa item theo san pham.Bấm dấu trừ (nút xuống) bên checkout.tpl
	function remove_item_cart(idSP,STTPP,this_item,iconmoney,divdels,price){
		$('.form-box-overlay').css('z-index','999999');
		$('.form-box-overlay').css('opacity','0.1');
		$('.form-box-overlay').css('display','block');
		$('.form-box-overlay').html('<img style=" position: absolute; margin: auto;top: 0; left: 0;right: 0;bottom: 0;" src="upload/ajax-loader.gif"> loading...'); 
		var divdel=divdels;
		var idSP=idSP;
		var sttplus=STTPP;
		var $this=this_item;
		$.ajax({	
			type:'POST',
			url:'index.php?mod=j_delete',
			data:{idSP:idSP,stt:sttplus},
			success:function(smgs){
				$('.sum_total').html(iconmoney + ''+ smgs);
				var sosp_n=$('.total_dishis:first').text();
				sosp_n=parseInt(sosp_n);
				var sosp_tt=sosp_n-1;
				$('.total_dishis').html(sosp_tt);
				var parent_d=$this.closest('.quantity');
				var sls=$(parent_d).find('.quantity'+idSP).text();
				sls=parseInt(sls);
				var slsnow=sls-1;
				if(slsnow>0){
					$(parent_d).find('.quantity'+ idSP).html(slsnow);
					var pr=slsnow;
					var pri_ce=price;
					pri_ce=pri_ce.replace(',','.');
					pri_ce=parseFloat(pri_ce);
					var prices=(pr*pri_ce).toFixed(2);
					var pricess=prices.replace('.',',');
					$(parent_d).parent().find('.price'+idSP).html( iconmoney+'' +pricess);
				}
				if(slsnow==0) {
					divdel.remove();
					$.ajax({	
						type:'POST',
						url:'index.php?mod=j_deleteCarts',
						data:'idSP='+ idSP,
						success:function(smgss){}
					})	
				}

				$('.form-box-overlay').css('display','none');
                $('.form-box-overlay').css('z-index','9999');
                $('.form-box-overlay').css('opacity','1');
				$('.form-box-overlay').html(''); 
			}
		});return false;
	}
		