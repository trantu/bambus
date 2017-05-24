<!-- BEGIN:main -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{TITLE} | Zahlung</title>
	<link rel="stylesheet" href="style/css/style.css">
	<link rel="stylesheet" href="style/css/animate.css">
	<link rel="stylesheet" href="style/css/tooltipster.css">
	<link rel="stylesheet" href="style/css/custom.css">
	<link href="style/css/jquery-ui.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="style/css/mobile.css">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
	<!-- favicon -->
	<link rel="icon" href="{FAVICON_ICO}">
	<script type="text/javascript">
    	var ICONPRICE='{ICONPRICE}';
    	var address_fail_txt="{LANGUAGECHECKOUT.address_fail}";
    	var order_min_txt="{LANGUAGECHECKOUT.order_min}";
    	var address_fail="{LANGUAGECHECKOUT.address_fail}";
    	var money_fail="{LANGUAGECHECKOUT.money_fail}";
    	var enter_stress_txt="{LANGUAGECHECKOUT.enter_stress}";
    	var enter_housenumber_txt="{LANGUAGECHECKOUT.enter_housenumber}";
    	var enter_postalcode_txt="{LANGUAGECHECKOUT.enter_postalcode}";
    	var enter_region_txt="{LANGUAGECHECKOUT.enter_region}";
    	var enter_firstname_txt="{LANGUAGECHECKOUT.enter_firstname}";
    	var enter_lastname_txt="{LANGUAGECHECKOUT.enter_lastname}";
    	var enter_phone_txt="{LANGUAGECHECKOUT.enter_phone}";
    	var enter_email_txt="{LANGUAGECHECKOUT.enter_email}";
    	var buy_more_txt="{LANGUAGECHECKOUT.buy_more}";
    	var please_wait_txt="{LANGUAGECHECKOUT.please_wait}";
    	var buy_success="{LANGUAGECHECKOUT.buy_success}";

		var message_adress_false="{LANGUAGEMAIN.notice_address_fail}";
    	var please_check_checkbox="{LANGUAGEMAIN.please_check_checkbox}";
    	//alert("Khoảng cách: {KHOANGCACH} km");
    	//alert("GIÁ Tiền: {TIENKHOANGCACH} $");
	</script>
	<!-- BEGIN:checkimgdishis -->
	<style>
	    .imgLiquidFill {display: none; background-image: none;}
	</style>
	<!-- END:checkimgdishis -->
</head>
<body>
	<header>
		{FILE {TEMPLATEHEADER}}
	</header>
	<!--/HEADER-->

	<!--CHECKOUT-->
	<div id="checkout-wrap">
		<section id="checkout">
			<article class="left" id="mobile_cart_left">
				<article id="cart">
					<h2><span>{LANGUAGECHECKOUT.your_cart}</span></h2>
					<hr><hr>
					<div id="cart-header">
						<p>{LANGUAGECHECKOUT.product}</p>
						<p>{LANGUAGECHECKOUT.description}</p>
						<p>{LANGUAGECHECKOUT.price}</p>
						<p>{LANGUAGECHECKOUT.quantity}</p>
						<p>{LANGUAGECHECKOUT.subtotal}</p>
						<p>{LANGUAGECHECKOUT.rmcart}</p>
					</div>
					<ul>
						<!-- BEGIN:cart -->
						<li class='licart'>
							<div class="circle tiny">
								<figure class="imgLiquidFill">
									<img src="upload/products/{IMAGE}" alt="dish">
								</figure>
								<div class="shadow"></div>
								<div class="fill"></div>
							</div>
							<div class="description">
								<h6>{NAME}</h6>
								<p>{BEILAGE}</p>
								<p>{NOTE}</p>
							</div>
							<!-- <h6 class="price-small">{LANGUAGECHECKOUT.price}Price:</h6> -->
							<h6>{ICONPRICE}<span>{PRICE}</span></h6>
							<div class="quantity">
								<div class="quantity{IDSP}">{QTY}</div>
								<a href="#" class="counter up" onclick="var idSP='{IDSP}';var STTPP='{STTPP}';var this_item=$(this);iconmoney='{ICONPRICE}';var price='{PRICE}';return add_item_cart(idSP,STTPP,this_item,iconmoney,price)">
								</a>
								<a href="#" class="counter down" onclick="var idSP='{IDSP}';var STTPP='{STTPP}';var this_item=$(this);iconmoney='{ICONPRICE}';var divdels=$(this).closest('li');var price='{PRICE}';
												return remove_item_cart(idSP,STTPP,this_item,iconmoney,divdels,price)">
								</a>
							</div>
							<!-- <h6 class="subtotal-small">Subtotal:</h6> -->
							<h6><span class='price{IDSP}'>{ICONPRICE}{PRICES}</span></h6>
							<a href="#" class="remove remove_sp_total" idSP="{IDSP}">
								<img src="style/images/remove-cart.png" alt="remove">
							</a>
						</li>
						<!-- END:cart -->
					</ul>
				</article>
				
				<div class="cleaner"></div>
				<article id="info_user_payment" style="display:none">
					<h2><span>{LANGUAGECHECKOUT.deliver}</span> </h2>
					<hr><hr>
					<form id="delivery-info" action='index.php?mod=paypal' method="post">
					    <div>
							<label for="name">{LANGUAGEREGISTER.firstname}</label>
							<input type="text" id="info_firstname" value="{FIRSTNAMEUSER}" name="firstname" placeholder="{LANGUAGEREGISTER.firstname_holder}">
						</div>
                        <div>
                            <label for="Phone">{LANGUAGEREGISTER.phone}</label>
                            <input type="text"   name="phone" value="{PHONEUSER}" id="info_phone" placeholder="{LANGUAGEREGISTER.phone_holder}"/>
                        </div>
						<div>
							<label for="name">{LANGUAGEREGISTER.lastname}</label>
							<input type="text" id="info_lastname" value="{LASTNAMEUSER}" name="lastname" placeholder="{LANGUAGEREGISTER.lastname_holder}">
						</div>
                        <div style='max-height:86px'>
                            <label for="email">{LANGUAGECHECKOUT.type_payment}</label>
							<span style="display:block ;float:left;width:100px;padding-top: 20px;" >
						  		<input  type="radio"  style="display:block" checked='checked' name="type_payment_order" id='type_payment_order' value="1" /><span style='font-family: "Source Sans Pro", sans-serif;'><img src="style/images/bargeld.png" style="height: 15px" /></span>
						  	</span >
						  	<span style="display:block ;float:left;width:100px;padding-top: 20px;">
						  		<input  type="radio"  style="display:block" name="type_payment_order" id="type_payment_order" value="2"/><span style='font-family: "Source Sans Pro", sans-serif;'><img src="style/images/paypal.png" style="height: 15px" /></span>
						  	</span>
						  	<!--
                            <span style="display:block ;float:left;width:100px;padding-top: 20px;">
						  		<input  type="radio"  style="display:block" name="type_payment_order" id="type_payment_order" value="5"/><span style='font-family: "Source Sans Pro", sans-serif;'><img src="style/images/sofort.png" style="height: 15px" />   </span>
						  	</span>
                            <span style="display:block ;float:left;width:100px;padding-top: 20px;">
						  		<input  type="radio"  style="display:block" name="type_payment_order" id="type_payment_order" value="4"/><span style='font-family: "Source Sans Pro", sans-serif;'><img src="style/images/EC.png" style="height: 15px" />   </span>
						  	</span>
                            	<option value="1">{LANGUAGECHECKOUT.cash}</option>
								<option value="2">{LANGUAGECHECKOUT.paypal}</option>
								<option value="3">{LANGUAGECHECKOUT.credit}</option>
								<option value="4">{LANGUAGECHECKOUT.mobile}</option>
								 <option value="5">{LANGUAGECHECKOUT.sofort}</option>
								-->
                        </div>

                        <div style="height:86px;float:none">
						  	<span style="display:block ;float:left;width:100px;padding-top: 20px;" >
						  		<input  type="radio" {IFMALE}  style="display:block" checked='checked' name="sex" id='male_sex' value="1" /><span style='font-family: "Source Sans Pro", sans-serif;'>{LANGUAGEREGISTER.male}</span>
						  	</span >
						  	<span style="display:block ;float:left;width:100px;padding-top: 20px;">
						  		<input  type="radio" {IFFEMALE} style="display:block" name="sex" id="female_sex" value="0"/><span style='font-family: "Source Sans Pro", sans-serif;'>{LANGUAGEREGISTER.female}</span>
						  	</span>
						</div>


						<div style="height:86px;">
							<label for="postal_code">{LANGUAGEREGISTER.postalcode}</label>
							<input type="text" placeholder="Postalcode"   value="{POSTALCODEUSER}" id="info_postalcode" name="postalcode">
						</div>
						<div>
                    		<label for="Region">{LANGUAGEREGISTER.region}</label>
                    		<input type="text" readonly  name="region"  value="{REGIONUSER}" id="info_region" />
                    	</div>
						<div>
							<label for="stress">{LANGUAGEREGISTER.street}</label>
							<input type="text"  name="stress"  value="{STRESSUSER}" id="info_stress_c" /> 
                    	</div>
                    	<div>
							<label for="apartament">{LANGUAGEREGISTER.numberhouse}</label>
							<input type="text" placeholder="Numberhouse"  value="{NUMBERHOUSEUSER}" id="info_numberhouse" name="numberhouse">
					</div>
						
					
										
                    <div style='max-height:86px'>
							<label for="Office">{LANGUAGEREGISTER.office}</label>
							<input type="text"  placeholder="{LANGUAGEREGISTER.office_holder}" value="{OFFICEUSER}" id="info_office" name="office">
						</div>
                    	<div>
                    		<label for="company">{LANGUAGEREGISTER.company}</label>
                    		<input type="text"   name="company" value="{COMPANYUSER}" id="info_company" placeholder="{LANGUAGEREGISTER.company_holder}"/>
                    	</div>
						<div>
							<label for="NotePosition">{LANGUAGEREGISTER.notePosition}</label>
							<textarea name="noteposition"  id="info_noteposition" placeholder="{LANGUAGEREGISTER.notePosition_holder}">{NOTEPOSITIONUSER}</textarea>
						</div>
						<div>
							<label for="Note">{LANGUAGEREGISTER.younote}</label>
							<textarea id="specifications info_note" name="note"  placeholder="{LANGUAGEREGISTER.younote_placeholder}">{NOTEUSER}</textarea>
						</div>
						<br>
						<div style="clear:both;width:100%;">
							<p class="address_error_pm" style='margin-left:30%;font-size: 1.125em;font-family: "Source Sans Pro", sans-serif;text-transform: uppercase;font-weight:600; color: red;line-height: 50px;margin-bottom: 40px;'> </p>
						</div>
						<input type="submit" id="payment-paypal" class="payment_paypal" value="{LANGUAGECHECKOUT.confirm_order}" style=''/>
					</form>
				</article>
			</article>
			<aside class="right" id="mobile_cart_right">
				<h2><span>{LANGUAGEMAIN.total}</span></h2>
				<hr><hr>
				<article class="ticket" style="background-color: {HEADER_COLOR}">
					<!--<img src="style/images/ticket-serrated-border.png" alt="serrated-border">-->
					<h6>{LANGUAGEMAIN.yoderticket}</h6>
					<p>{LANGUAGEMAIN.cartsubtotal}<span class="sum_total">{ICONPRICE}{TOTALCART}</span></p>
					<p>{LANGUAGEMAIN.ordermin}<span class="total_min">{ICONPRICE}{PRICEMIN}</span></p>
					<p class="total">{LANGUAGEMAIN.total}<span class="sum_total ">{ICONPRICE}{TOTALCART}</span></p>
					<a href="#" class="button red confirm_order">Bestellen</a>
					<!--<ul style="width:190px;margin: 25px auto 10px;">
						<li style="float:left"><img src="style/images/cc-visa.png" alt="cc"></li>
						<li style="float:left"><img src="style/images/cc-master.png" alt="cc"></li>
						<li style="float:left"><img src="style/images/cc-amex.png" alt="cc"></li>
						<li style="float:left"><img src="style/images/cc-paypal.png" alt="cc"></li>
						<li style="float:left"><img src="style/images/cc-discover.png" alt="cc"></li>
						<li style="float:left"><img src="style/images/cc-maestro.png" alt="cc"></li>
					</ul>
					-->
					<img src="style/images/cart-logo.png" alt="cart-logo">
					<p>{LANGUAGEMAIN.thankforu}</p>
					<div style="height: 30px;width: 100%;position: relative;"></div>
					<div class="container"></div>
				</article>
			</aside>
			<div class="cleaner"></div>
		</section>
	</div>
	<!--/CHECKOUT-->
	{FILE {TEMPLATEFOOTER}}

	<div id="xoay-xoay"></div>
<section class="form-box-overlay"></section>

<article class="form-box enterstress" style="display:none;z-index:1000021;">
	<a href="#" class="form-close">
		<img src="style/images/form-close.png" alt="close">
	</a>
	<img src="{FORM_LOGO}" alt="logo">
	<h3>{LANGUAGEMAIN.deine_address}</h3>
	<form id="address_form" action="">
		<input type="text" name="enter_address" required id="enter_address" placeholder="{LANGUAGEMAIN.enter_address_hover}" value="{ADDRESSOLD}">
		<input type="submit"  value="{LANGUAGEMAIN.btn_submit}" style="background-color:{HEADER_COLOR}">
	</form>
	<p>{LANGUAGEMAIN.haccount}<br><a href="#" class="popup login">{LANGUAGEMAIN.lginnow}</a></p>
<div id="opacity-body"></div>
</article>

	{FILE {TEMPLATELOGIN}}
<script src="style/js/jquery-1.11.1.min.js"></script> 
<script src="style/js/imgLiquid-min.js"></script>
<script src="style/js/jquery.tooltipster.min.js"></script>
<script src="style/js/wow.min.js"></script>
<script src="style/js/menu.js"></script> 
<script type="text/javascript" src="style/jsme/jquery-ui.js"></script>
<script src="style/js/checkout.js"></script>
<script src="style/js/forms.js"></script>
<script src="style/jsme/login.js"></script>
<script type="text/javascript" src="style/jsme/autogoogle.js"></script>
<script type="text/javascript" src="style/jsme/jquery-ui.js"></script>
<script src="style/fancybox/jquery.fancybox-1.3.4.js"></script>
<script src="style/js/typeahead.bundle.min.js"></script>
<script src="style/js/bloodhound.min.js"></script>
<script src="style/js/typeahead.jquery.min.js"></script>

<article class="form-box enterstress" style="display:none;z-index:1000021;">
	<a href="#" class="form-close">
		<img src="style/images/form-close.png" alt="close">
	</a>
	<img src="style/images/form-logo.png" alt="logo">
	<h3>{LANGUAGEMAIN.deine_address}</h3>
	<form id="address_form" action="">
		<input type="text" name="enter_address" required id="enter_address" placeholder="{LANGUAGEMAIN.enter_address_hover}" value="{ADDRESSOLD}">
		<input type="submit"  value="{LANGUAGEMAIN.btn_submit}" style="background-color:#95c12a">
	</form>
	<p>{LANGUAGEMAIN.haccount}<br><a href="#" class="popup login">{LANGUAGEMAIN.lginnow}</a></p>
</article>

<script src="style/jsme/cart.js"></script>


    <script>
$('#payment-paypal').on('click',function(){
 
 var type_paypal = Number($('#type_payment_order').val());
  
  if((type_paypal == 2) || (type_paypal == 3)) // 2 là paypal, 3 là thẻ
  {
	$('.form-box-overlay').css('z-index','999999');
    $('.form-box-overlay').css('opacity','0.7');
    $('.form-box-overlay').css('display','block');
    $('.form-box-overlay').html('<img style=" position: absolute; margin: auto;top: 0; left: 0;right: 0;bottom: 0;" src="upload/ajax-loader.gif">');
  }
  else if(type_paypal == 1)
  {
  }

});



</script>
<article class="form-box reset" id="pricemin_error">
	<a href="#" class="form-close">
		<img src="style/images/form-close.png" alt="close">
	</a>
	<img src="{FORM_LOGO}" alt="logo">
    <p class='show_error_price' style='color:red;font-size:1em;font-weight:bold;'></p>
</article>
<style>
	.ui-autocomplete {
			 z-index: 10000000;
	}
	#hover_cai li a:hover #menu_con{ display: block; width: 250px; height: 300px; z-index: 999909999;}
</style>

</body>
</html>



<!-- END:main -->

