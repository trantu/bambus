<!-- BEGIN:main -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{TITLE} Berlin | Asiatische Küche und Sushi | Online Bestellung Lieferservice</title>
	<link rel="stylesheet" href="style/css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="style/css/font-awesome.min.css">
	<link rel="stylesheet" href="style/css/style.css">
	<link rel="stylesheet" href="style/css/animate.css">
	<link rel="stylesheet" href="style/css/tooltipster.css">
	<link rel="stylesheet" href="style/css/custom.css">
	<link rel="stylesheet" href="style/css/giohangpopup.css">
	<link rel="stylesheet" href="style/css/mobile.css">
	<link href="style/css/jquery-ui.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
    .mySlides {display:none;}
    </style>
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
	<!-- favicon -->
	<link rel="icon" href="{FAVICON_ICO}">

	<noscript>
		<div>
			You must enable javascript to continue.
		</div>
	</noscript>
	<script type="text/javascript">
		var ICONPRICE='{ICONPRICE}';
		var message_adress_false="{LANGUAGEMAIN.notice_address_fail}";
		var please_check_checkbox="{LANGUAGEMAIN.please_check_checkbox}"
		var canback_txt="{LANGUAGECART.cantback}";
		var hide_menu_txt="{LANGUAGEMAIN.showmenu}";
		var show_menu_txt="{LANGUAGEMAIN.hidemenu}";
		var hide_cart_txt="{LANGUAGEMAIN.hidecart}";
		var show_cart_txt="{LANGUAGEMAIN.showcart}";
		var check_menu=0;
		var cart_in=0;
	</script>
	<!-- BEGIN:checkimggruppe -->
	<style>
		.image_group_top{display: none;}
	</style>
	<!-- END:checkimggruppe -->

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

<!--SHOP-->
<div id="shop-wrap">
	<section id="shop">
		<div id="info-board" style="background-color: rgb(227, 198, 181); font-weight: bold; font-size: large;"> {INFO_BOARD} </div><br>
		<aside class="left" id="mobile_category">
			<!--CATEGORIES-->
			<article>
				<h2 style="color:{HEADER_COLOR};"><span>{LANGUAGEMAIN.categories}</span></h2>
				<hr><hr>
				<ul class="cat-menu">
					<!-- BEGIN:menu -->
					<li {id_default}><a href="#"  NameGruppe="{GRUPPEID}" class="class{GRUPPEID}" height="200" img="upload/groups/{GRUPPEBILD}" style="color:#{GRUPPEFARBE}">{NAMEGRUPPE}</a></li>
					<!-- END:menu -->
				</ul>
			</article>
			<!--/CATEGORIES-->
		</aside>

		<aside class="right"  id='mobile_cart'>
				<h2 style="color: {HEADER_COLOR}"><span>{LANGUAGEMAIN.total}</span></h2>
				<hr><hr>
				<article class="ticket" style="background-color: {HEADER_COLOR}">
					<!--<img src="style/images/ticket-serrated-border.png" alt="serrated-border" width="100%">-->
					<h6>{LANGUAGEMAIN.yoderticket}</h6>
					<p>{LANGUAGEMAIN.cartsubtotal}<span class="sum_total">{ICONPRICE}{TOTALCART}</span></p>
					<p>{LANGUAGEMAIN.ordermin}<span class="total_min">{ICONPRICE}{PRICEMIN}</span></p>
					<div id="order_summary" style="min-height: 10px;height: auto;display: inline-block;border-top: 1px dashed #4b4b4b;" >
						<!-- BEGIN:cart -->
						<div class="sum-01 removeabc {IDSP}{STTPP} root{IDSP}" style="width:264px; float:left; margin:10px; margin-bottom:0;">
							<ul style="list-style:none;">
								<li style="width:40px; float:left;" class="lichacon">
									<span style="width:24px; height:24px; border:1px solid #ddd; float:left; text-align:center; line-height:24px; background:white;" class ="quantity{IDSP}">{QTY}</span>
									<a href="#" style="float:left; margin:-3px 0 0 2px" class='append' idSP='{IDSP}' stt='{STTPP}'
									   onclick=" var idSP=$(this).attr('idSP');var STTPP='{STTPP}';var this_item=$(this);iconmoney='{ICONPRICE}';var price='{PRICE}';return add_item(idSP,STTPP,this_item,iconmoney,price)">
										<img src="style/images/cong.jpg" alt="" />
									</a>

									<a href="#" style="float:left; margin:0px 0 0 2px;" class='remove' idSP='{IDSP}'
									   onclick="var idSP=$(this).attr('idSP');var STTPP='{STTPP}';var this_item=$(this);iconmoney='{ICONPRICE}';var divdels=$(this).closest('div');var price='{PRICE}';
											   return remove_item(idSP,STTPP,this_item,iconmoney,divdels,price)">
										<img src="style/images/tru.jpg" alt="" />
									</a>
								</li>
								<!-- BEGIN:namenot -->
								<li style="width:154px; float:left;">
									<p style="float:left; width:164px; margin:0 0 0 10px; display:block; line-height:26px;height:26px; overflow:hidden;color:#fff;" title="{NAME}">{NAME}</p>
									<!-- END:namenot -->

									<!-- BEGIN:beilage -->

								<li style="width:154px; float:left;">
									<p style="float:left; width:164px; margin:0 0 0 10px; display:block; height:16px; overflow:hidden;color:#fff;" title="{NAME}">{NAME}</p>
									<a href="#"  class="remove_click">
										<!-- BEGIN:dishisshiss -->
										<p style="float:left; width:164px; margin:0 0 0 10px; display:block; height:16px; overflow:hidden; font-size:11px; font-style:italic;color:#fff;" title="{BEILAGE}">*--------{BEILAGE}---------*</p>
										<!-- END:dishisshiss -->
									</a>
									<!-- END:beilage -->
								</li>
								<!-- BEGIN:pricesession -->
								<li style="width:50px; float:right;" class="licuoicung">
									<span style="text-align:right; line-height:26px; width:50px; float:right;color:#fff;" class="price{IDSP}">{ICONPRICE}{PRICES}</span>
									<div style="color:#fff">
										<a style="color:orange" href="#" title="" class="shownote">{LANGUAGEMAIN.notetext}</a>
									</div>
									<article class="form-box note_ones" style="width: 400px;background-color: #fff;border-radius: 2px;padding: 105px 20px 20px;position: fixed;z-index: 10000;top: 50%;left: 50%;margin-left: -200px;height:auto;">
										<a href="#" class="form-close">
											<img src="style/images/form-close.png" alt="close">
										</a>
										<img src="{FORM_LOGO}" alt="logo">
										<form>
											<textarea class="note-text" cols="30" rows="10" placeholder="{NOTECONTENT}">{NOTE}</textarea>
											<button class="note_change_idsp" idsp="{IDSP}" type="button"  href='#'  style="background-color: #95c12a;width: 100%;font-size: 1.125em;font-family: 'Source Sans Pro', sans-serif;text-transform: uppercase;font-weight: 900;color: #fff;line-height: 40px;cursor: pointer;margin-bottom: 40px;border-radius: 2px;">{LANGUAGEMAIN.addcart}</button>
										</form>
									</article>
								</li>
								<!-- END:pricesession -->
							</ul>
						</div>
						<!-- END:cart -->
					</div>
					<p class="total" style='border-top: 1px dashed #4b4b4b;'>{LANGUAGEMAIN.total}<span class="sum_total ">{ICONPRICE}{TOTALCART}</span></p>
					<!--
                    <a id="next_pack" onclick="return add_pack()" class="button red next_pack" >{LANGUAGEMAIN.next_pack}</a>*}
					-->
					<a href="index.php?mod=checkout" class="button red confirm_order" >{LANGUAGEMAIN.confirmorder}</a>
					<!--<ul style="width:190px;margin: 25px auto 10px;">
						<li style="float:left"><img src="style/images/cc-visa.png" alt="cc"></li>
			<!-- 		<li style="float:left"><img src="style/images/cc-visa.png" alt="cc"></li>
						<li style="float:left"><img src="style/images/cc-master.png" alt="cc"></li>
						<li style="float:left"><img src="style/images/cc-amex.png" alt="cc"></li>
						<li style="float:left"><img src="style/images/cc-paypal.png" alt="cc"></li>
						<li style="float:left"><img src="style/images/cc-discover.png" alt="cc"></li>
						<li style="float:left"><img src="style/images/cc-maestro.png" alt="cc"></li>
						<li style="float:left"><img src="style/images/cc-visa.png" alt="cc"></li> -->

						<li style="float:left"> Zahlungsmethode: Bar, <img src="style/images/cc-paypal.png" alt="cc"></li>
					</ul>
					<img src="{FORM_LOGO}" alt="cart-logo">
					<p>{LANGUAGEMAIN.thankforu}</p>
					<p>*Allergeninformation gemäß Codex-Empfehlung:<br>
					 <br>
						a) glutenhaltiges Getreide <br>
						b) Krebstiere <br>
						c) Eier von Geflügel <br>
						d) Fisch (Fischgelatine) <br>
						e) Erdnüsse <br>
						f) Sojabohnen <br>
						g) Milch von Säugetieren (inkl. Laktose) <br>
						h) Schalenfrüchte <br>
						l) Sellerie <br>
						m) Senf <br>
						n) Sesamsamen <br>
						o) Schwefeldioxid und Sulfate <br>
						p) Lupinen <br>
						r) Weichtiere (Schnecken, Muscheln, Tintenfische etc.)<br>
						<br>
						*Zusatzstoff-Nummerierung der Speisen- und Getränke <br>
						1 = Farbstoff<br>
						2 = geschwärzt<br>
						3 = Konservierungsstoffe<br>
						4 = geschwefelt <br>
						5 = mit Phosphat<br>
						6 = mit Antioxidationsmittel<br>
						7 = mit Geschmacksverstärker<br>
						8 = gewachst<br>
						9 = mit Süßungsmittel(n)<br>
						10 = mit Zuckerart(en) und Süßungsmittel(n)<br>
						11 = enthält eine Phenylalaninquelle<br>
						12 = kann bei übermäßigem Verzehr abführend wirken<br>
						13 = koffeinhaltig<br>
						14 = chininhaltig</p>

					<div style="height: 30px;width: 100%;position: relative;"></div>

					<div class="container"></div>

				</article>
        </aside>
		<article class="right"  id='mobile_dishis'>
			<h2 style="color:{HEADER_COLOR};"><span>{LANGUAGEMAIN.name}</span>{LANGUAGEMAIN.food}
				<input class="typeahead" type="text" placeholder="SUCHE NACH GERICHTEN..." style="border-style: solid;">
			</h2>

			<hr>
			<article id="views">
				<ul class="views">
					<li ><a href="#" class="grid tooltip" title="Grid View"></a></li>
					<li><a href="#" class="detail tooltip" title="Detail View"></a></li>
					<li class="selected"><a href="#" class="list tooltip" title="List View"></a></li>
				</ul>
			</article>
			<p class='image_group_top'> <img src="upload/groups/{GRUPPEBILDMAIN}" alt="Error" width="100%" height="200px"> </p> <br>
			<ul class="dishes list" style="width:100%">
				<!-- BEGIN:name -->
				<li class='root_append root_append_notbeilage'  idsp="{IDSP}" style="margin: 0 12px 30px 0;">
					<div class="circle tiny appendsall">
						<figure class="imgLiquidFill img_dishis_dp">
							<img src="upload/products/{ONLINEBILD}" alt="dish" class="img_dishis_dp">
						</figure>
						<div class="shadow"></div>
						<a href="#">
							<div class="fill red cart-tip">
								<img src="style/images/plus-icon.png" alt="star">
							</div>
						</a>
					</div>
					<article>
						<a href="#" ><h6 style="color:#{ONLINEFARBE}">(NR. {IDSP}) {NAME}</h6></a>
						<hr>
						<p>{NAMEONLINE}</p>
					</article>
					<div class="price">
						<!-- <div>
                            <p class="quantity">15</p>
                            <p class="measure">pcs</p>
                        </div> -->
						<p>{PRICE}{ICONPRICE}</p>
					</div>
					<a href="#" class="button red appendsall">{LANGUAGEMAIN.addcart}</a>
					<h6>{PRICE}{ICONPRICE}</h6>
				</li>
				<!-- END:name -->
				<!-- BEGIN:names -->
				<li class='root_append ' item="{COUNT_DISHIS}" style="margin: 0 12px 30px 0;">
					<div class="circle tiny appends-beilage" item="{COUNT_DISHIS}">
						<figure class="imgLiquidFill img_dishis_dp">
							<img src="upload/products/{ONLINEBILD}" alt="dish" class="img_dishis_dp">
						</figure>
						<div class="shadow"></div>
						<a href="#">
							<div class="fill red cart-tip">
								<img src="style/images/plus-icon.png" alt="star">
							</div>
						</a>
					</div>
					<article class="appends-beilage" item="{COUNT_DISHIS}">
						<a href="#"><h6 style="color:#{ONLINEFARBE}">(NR. {IDSP}) {NAME}</h6></a>
						<hr>
						<p>{NAMEONLINE}</p>
					</article>
					<div class="price" class="appends-beilage" item="{COUNT_DISHIS}">
						<!-- <div>
                            <p class="quantity">15</p>
                            <p class="measure">pcs</p>
                        </div> -->
						<p>{PRICE}{ICONPRICE}</p>
					</div>
					<a href="#" class="button red appends-beilage" idSP="{IDSP}" item="{COUNT_DISHIS}">{LANGUAGEMAIN.addcart}</a>
					<div class="beilage-list" style="text-align:center; ">
						<h3 style="">{SIDEDISH}</h3>
						<div class="count_ds">
							<!-- BEGIN:demdishis -->
							<p class="count_ds{DEM_DS} count_ds_c ">{STEP} {DEM_DS} </p>
							<!-- END:demdishis -->
						</div>

                            <!-- BEGIN:beilage -->
                            <ul beilage="{BEILAGE}" style="display:none;" price="{PRICES}" idSP="{BEILAGE}{IDSP}" idSPs="{IDSP}" classCLick="{CLASSDS}" onceclass="{GROUPCLASS}class"  class="beilage-click  {GROUPCLASS}class" display="{DISPLAY_DS}">
                                <li class="list-1s">
                                    <input type="checkbox" style="display:inline-block" sttbei="{GROUPCLASS}"  class='{GROUPCLASS}classinputs'  idSPs="{IDSP}" price="{PRICES}" value="{BEILAGE}" />
                                </li>
                                <li class="list-2s">
                                    <a href="#" style="text-decoration:none;font-weight:bold;font-size:17px;">{BEILAGE}</a>
                                </li>
                                <li class="list-2s">
                                    <a href="#" style="text-decoration:none;font-size:17px;"> + {PRICES}{ICONPRICE} </a>
                                </li>
                                <br><hr style="border:1px solid mistyrose">
                            </ul>
                            <!-- END:beilage -->

                            <div class="button_beilage" style="clear:both;display:block;height:33px;margin-top:10px;margin-bottom:15px;">
                                <a href="#" class="button green close backds"><!-- <img src="style/images/tick.png"> -->{LANGUAGEMAIN.btn_back}</a>
                                <a href="#" class="button green close boquads"><!-- <img src="style/images/tick.png" > -->{LANGUAGEMAIN.btn_next}</a>
                                <a href="#" class="button green close quitds"><!-- <img src="style/images/cross.png"> -->{LANGUAGEMAIN.btn_quit}</a>
                            </div>
                            <p class="error-beilage" style="color:red;width:100%; text-align:center;font-size:14px;margin-bottom:10px;"></p>
                        </div>
						<article class="form-box note_ones" style="width: 400px;background-color: #fff;border-radius: 2px;padding: 105px 20px 20px;position: fixed;z-index: 10000;top: 50%;left: 50%;margin-left: -200px;height:auto;">
							<a href="#" class="form-close">
								<img src="style/images/form-close.png" alt="close">
							</a>
							<img src="{FORM_LOGO}" alt="logo">
							<form >
								<textarea class="note-text" cols="30" rows="10" placeholder="{NOTECONTENT}"></textarea>
								<button class="note-ok-beilage" idsp="{IDSP}" type="button"  href='#'  style="background-color: #95c12a;width: 100%;font-size: 1.125em;font-family: 'Source Sans Pro', sans-serif;text-transform: uppercase;font-weight: 900;color: #fff;line-height: 40px;cursor: pointer;margin-bottom: 40px;border-radius: 2px;">{LANGUAGEMAIN.addcart}</button>
							</form>
						</article>
						<h6 class="appends-beilage" item="{COUNT_DISHIS}">{PRICE}{ICONPRICE}</h6>
					</li>
					<!-- END:names -->
				</ul>
				<div class="cleaner"></div>
			</article>
			<div class="cleaner"></div>
		</section>
	</div>
	<!--/SHOP-->

{FILE {TEMPLATEFOOTER}}

<section class="form-box-overlay" style="{DISPLAYFORMADDRESS}"></section>

<section class="form-box-overlay2" style="{DISPLAYFORMATTIME}"></section>

<!--address FORM-->
<article class="form-box enterstress" style="{DISPLAYFORMADDRESS} ;z-index:1000021;">
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
</article>
<!--/address FORM-->
{FILE {TEMPLATELOGIN}}

<div id="hide_category">
	<button>{LANGUAGEMAIN.txt_menu_gruppe_mobile}</button>
</div>
<div id="hide_cart_in">
	<button>{LANGUAGEMAIN.hidecart}</button>
</div>

<!-- BEGIN:timeout -->
<article class="form-box reset" id="pricemin_error" style='display:block;'>
	<a href="#" class="form-close form_close_time">
		<img src="style/images/form-close.png" alt="close">
	</a>
	<img src="{FORM_LOGO}" alt="logo">
	<p class='show_error_price' style='color:green;font-size:1.5em;font-weight:bold;'>{TOTITLE}</p>
</article>

<style>
	.form-box-overlay{display: block;}
	.confirm_order,.cart-items{display: none !important;}
</style>
<!-- END:timeout -->

<!-- BEGIN:alert_paid -->
<article class="form-box reset" id="pricemin_error" style='display:block;'>
	<a href="#" class="form-close form_close_time">
		<img src="style/images/form-close.png" alt="close">
	</a>
	<img src="{FORM_LOGO}" alt="logo">
	<p class='show_error_price' style='color:red;font-size:200%;font-weight:bold;'>{ALERT_TITLE}</p>
</article>

<style>
	.form-box-overlay{display: block;}
</style>
<!-- END:alert_paid -->
<script src="style/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script>
	(function($){
		$(window).on("load",function(){

			$("#content-1").mCustomScrollbar({
				theme:"minimal"
			});

		});
	})(jQuery);
</script>
	<script src="style/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="style/jsme/jquery-ui.js"></script>
<script src="style/js/jquery.bxslider.min.js"></script>
<script src="style/js/waypoints.min.js"></script>
<script type="text/javascript" src="style/jsme/autogoogle.js"></script>
<script src="style/js/typeahead.bundle.min.js"></script>
<script src="style/js/bloodhound.min.js"></script>
<script src="style/js/typeahead.jquery.min.js"></script>
	<script src="style/js/imgLiquid-min.js"></script>
	<script src="style/js/jquery.tooltipster.min.js"></script>
	<script src="style/js/wow.min.js"></script>
	<script src="style/js/shop.js"></script>
	<script src="style/jsme/main.js"></script>
	<script src="style/js/main.js"></script>
	<script src="style/jsme/menu_mobile.js"></script>
	<script src="style/js/forms.js"></script>
	<script src="style/jsme/append-beilage.js"></script>
	<script src="style/jsme/cart.js"></script>
	<script src="style/jsme/login.js"></script>
	<script src="style/js/menu.js"></script>
	<script type="text/javascript" src="style/jsme/autogoogle.js"></script>
	<script type="text/javascript" src="style/jsme/jquery-ui.js"></script>
	<script type="text/javascript" src="style/jsme/custom-slideshow.js"></script>

<style>
	.ui-autocomplete {
		z-index: 10000000;
	}
	#hover_cai li a:hover #menu_con{ display: block; width: 250px; height: 300px; z-index: 999909999;}
</style>


</body>
</html>

<!-- END:main -->
