//"use strict";
/*----------------
	TOOLTIP
----------------*/

$('.tooltip').tooltipster({
	animation: 'grow',
	position: 'bottom'
});
  
    var check_address_sb=0; // cờ để nhận biết submit hay button  (nut payment click)

    $('#info_postalcode').autocomplete({
        source: function( request, response ) {
            $.ajax({
                url:"index.php?mod=j_getpostal",
                type: 'POST',
                data: "key=" + request.term,
                success: function(datas) {
                    //alert(datas);
                    console.log(datas);
                    var data = $.parseJSON(datas);
                    console.log(data);
                    response(data);         
                }
            })
        }
    });


  $('#info_stress_c').autocomplete({
    source:function(request,response){
      $.ajax({
            url:"index.php?mod=get_stress",
            type: 'POST',
            data: "address=" + request.term,
            success: function(datasv) {
                var datam = jQuery.parseJSON(datasv);
                response(datam);        
            }
        })
    }

  });  


   

// Xử lý chỉ nhập số cho Postal Code
$("#info_postalcode").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });


    $('#info_postalcode').blur(function(){
    	var postal=$('#info_postalcode').val();
    	$.ajax({
    		type:'POST',
    		url:"index.php?mod=j_getregion",
    		data:"postal=" + postal,
    		success:function(sms){
    			$('#info_region').val(''+sms);
    		}
    	})
    });

   $('.confirm_order').on('click',function(){
        var total_min_s = $('.total_min:first').text().substring(1); // Lấy tiền oder tối thiểu bỏ ký tự đầu là $
        var total_min = parseFloat(total_min_s); // ép kiểu Float
        if(isNaN(total_min)==true){ // Nếu giá trị là kiểu chuỗi báo lỗi
            $('.show_error_price').html(address_fail_txt);
            $('#pricemin_error').css('display','block');
            $('.form-box-overlay').css('display','block');
            $('#info_user_payment').css('display','none');
        }
        var sum_total_s=$('.sum_total:first').text().substring(1);
        var sum_total=parseFloat(sum_total_s);
        if(total_min > sum_total){ // Nếu tổng tiền mua < tổng tiền tối thiểu thì báo lỗi
            $('.show_error_price').html(order_min_txt +' '+ICONPRICE + total_min);
            $('#pricemin_error').css('display','block');
             $('#pricemin_error input').css('display','none');
            $('.form-box-overlay').css('display','block');
            $('#info_user_payment').css('display','none');
        }
        else{
            $('#info_user_payment').css('display','block');
            $('#info_email').focus();
        }
        return false;
   });
    
    //check dia chi theo money chua login
    $('#info_address').on('blur',function(){
      check_address_sb=0;
       $('#payment-paypal').attr('type', 'button');
      $('#payment-paypal').css('visibility','hidden');
        var total_min_s=$('.total_min:first').text().substring(1);
        var total_min=parseFloat(total_min_s);
        if(isNaN(total_min)==true){
            $('.show_error_price').html(address_fail_txt);
            $('#pricemin_error').css('display','block');
            $('.form-box-overlay').css('display','block');
            $('#info_user_payment').css('display','none');
        }
       var sum_total_s=$('.sum_total:first').text().substring(1);
       var sum_total=parseFloat(sum_total_s);
       if( $('#info_address').length > 0){
          var address_key=$('#info_address').val();
       }else{
          var address_key=$('#info_postalcode').val() +''+$('#info_numberhouse').val()+''+$('#info_stress').val()+''+$('#info_region').val();
       }

       $.ajax({
           url: 'index.php?mod=j_get_price',
           type: 'POST',
           data: {address: address_key},
           success:function(sms){
            $('#payment-paypal').css('visibility','visible');
                if(sms ==0){
                    $('.address_error_pm').html(address_fail);
                    $('#info_address').css('border','1px solid red');
                    $('#info_address').focus();
                }else{
                    $('.address_error_pm').html('');
                     $('#info_address').css('border','1px solid #e3e3e3');
                    if(sms > sum_total){
                        $('.address_error_pm').html(money_fail + sms+ICONPRICE);//$('#info_address').val('');
                        $('.total_min:first').text(ICONPRICE +sms);
                    }else{
                       //$('#delivery-info').submit();
                    }
                }
           }
       })
    });
    
    var stt_submit=0;
    
    // Tạo function để hiển thị lỗi
    function error(name_error) // Function templete lỗi
    {
      $('.show_error_price').html(name_error);
      $('#pricemin_error').css('display','block');
      $('#pricemin_error input').css('display','none');
      $('.form-box-overlay').css('display','block');
    }

    // Form nhập liệu checkout, bắt sự kiện submit
    $('#delivery-info').on('submit',function(e){
      if(stt_submit==0){ 
        e.preventDefault();

        // Kiểm tra các trường bắt buộc nhập liệu
        if($('#info_firstname').val().length < 1 ){
          $('#info_firstname').css('border','1px solid red');
          $('#info_firstname').focus();
          error(enter_firstname_txt);
          return false; // Đã có lỗi thì return false
        }
         if($('#info_lastname').val().length < 1 ){
          $('#info_lastname').css('border','1px solid red');
          $('#info_lastname').focus();
          error(enter_lastname_txt);
         return false;
        } 
        
        if($('#info_phone').val().length < 1 ){
          $('#info_phone').css('border','1px solid red');
          $('#info_phone').focus();
          error(enter_phone_txt);
          return false;
        }
/*
        if($('#info_email').val().length < 1 ){
          $('#info_email').css('border','1px solid red');
          $('#info_email').focus();
          error(enter_email_txt);
          return false; // Đã có lỗi thì return false
        }
*/

        // Vì Region được lấy theo Postalcode nên ko cần kiểm tra Region
        if($('#info_postalcode').val().length < 1 ){
          $('#info_postalcode').css('border','1px solid red');
          $('#info_postalcode').focus();
         error(enter_postalcode_txt);
          return false;
        }
        if($('#info_stress_c').val().length < 1 ){
          $('#info_stress_c').css('border','1px solid red');
          $('#info_stress_c').focus();
          error(enter_stress_txt);
          return false;
        }
        if($('#info_numberhouse').val().length < 1 ){
          $('#info_numberhouse').css('border','1px solid red');
          $('#info_numberhouse').focus();
          error(enter_housenumber_txt);
          return false;
        }
        
        
        // Bên trên nhập liệu đúng hết thì kiểm tra địa chỉ
        // Lấy địa chỉ kiểm tra
        var address_test=$('#info_stress_c').val() +' '+$('#info_numberhouse').val()+', '+$('#info_postalcode').val()+' '+$('#info_region').val(); 
        check_price_distance(address_test); // Kiểm tra lại tiền khoảng cách
      }
    });
    //-------------------------------------
    // Hàm kiểm tra địa chỉ tính tiền theo khoảng cách
          function check_price_distance(address_test)
          {
            $.ajax({
               url: 'index.php?mod=j_get_price',
               type: 'POST',
               data: {address: address_test},
               success: callback  // Thành công gọi hàm callback
            });
          }

function callback(tien_kc) 
{
  var sum_total_s=$('.sum_total:first').text().substring(1);
  var sum_total=Number(parseFloat(sum_total_s));
  if(tien_kc == 0)
  {
    error(address_fail);
    return false;
  }
  if(sum_total < tien_kc)
  {
    $('.total_min:first').text(ICONPRICE +tien_kc);
    error(buy_more_txt+'. '+order_min_txt+': '+ICONPRICE+tien_kc);
    return false;
  }
    $('.total_min:first').text(ICONPRICE +tien_kc);
    // Kiểm tra xem thanh toán bằng hình thức nào
    var type_paypal = Number($('#type_payment_order').val());
    if((type_paypal == 2) || (type_paypal == 3)) // 2 là paypal, 3 là thẻ
    {
      // Disable nút submit đi để chờ qua trang thanh toán
      $('#payment-paypal').attr('disabled', 'disabled');
      //$('#payment-paypal').css('visibility','hidden');
      //error(please_wait_txt); // Hiện thông báo waitting
      stt_submit=1;
      $('#delivery-info').submit();
    }
    else 
    {
		error(buy_success); // Hiện thông báo thành công
      stt_submit=1;
      $('#delivery-info').submit();
    }
}
