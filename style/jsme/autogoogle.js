$(document).ready(function(){

    //autocomplete stress google 
	$('#enter_address,#info_address').autocomplete({
		source:function(request,response){
			$.ajax({
                url:"index.php?mod=get_addresses",
                type: 'POST',
                data: "address=" + request.term,
                success: function(datasv) {
                    var datam = jQuery.parseJSON(datasv);
                    response(datam);         
                }
            })
		}
	}) 

    //gửi sang j_save_session_min_order để tạo session tính khoảng cách
    $('#address_form').submit(function(e){
        var enter_address=$('#enter_address').val();
        var datas={"address":enter_address};
        $.ajax({
            type:'POST',
            url:'index.php?mod=j_save_session_min_order',
            data:datas,
            success:function(sms){
                console.log(sms);
                if(sms=='1' || sms==1 || sms=='0' || sms==0 ) { // TODO:
                    location.reload();
                    $('.form-box-overlay').fadeOut(600);
                    $('.form-box.enterstress').fadeOut(600);
                }
                else {alert(message_adress_false);}
            }
            
        })
        e.preventDefault();
    })


    $('#click_show_address').on('click',function(){
        $('.form-box-overlay').css('display','block');
        $('.enterstress').css('display','block');
    })

})