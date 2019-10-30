<!-- BEGIN:main-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{TITLE} | Home</title>
	<link rel="stylesheet" href="style/css/style.css">
	<link rel="stylesheet" href="style/css/tooltipster.css">
	<link rel="stylesheet" href="style/css/animate.css">
	<link rel="stylesheet" href="style/css/custom.css">
	<link href="style/css/jquery-ui.css" rel="stylesheet" type="text/css" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
	<!-- favicon -->
	<link rel="icon" href="{FAVICON_ICO}">
</head>
<body>

	<!--HEADER-->
	<header>
		{FILE {TEMPLATEHEADER}}
		<!--HEADER-BOTTOM-->
		<div id="header-bottom-wrap">
			<section id="header-bottom">
				<h1 class="wow fadeInLeft">{LANGUAGEHOME.the_best}
					<span class=""><font color="green">{LANGUAGEHOME.asian_cuise}</font></span>
					<span class="right">{LANGUAGEHOME.in_all}</span>
				</h1>
				<a href="index.php?mod=main" class="order wow bounceInDown" data-wow-delay=".5s">{LANGUAGEHOME.start_you}</a>
				<!-- <img src="style/images/rabatt-text.png" style="width:50%;height:15%;" alt="rabatt-text" class="wow fadeInRight"> -->
				<!-- <img src="style/images/asian-girl.png" alt="asian-girl" class="wow fadeInRight"> -->
				<p class="wow fadeInRight right" style="text-align: -webkit-right; bottom: 0px; position: absolute;" ><font size="5pt" color="white">{DISCOUNTTEXT}</font></p>
			</section>	
		</div>
		<!--/HEADER-BOTTOM-->
	</header>
	<!--/HEADER-->	
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
	</article>

	{FILE {TEMPLATEFOOTER}}

<section class="form-box-overlay" style="display:none"></section>
<script src="style/js/jquery-1.11.1.min.js"></script>
<script src="style/js/jquery.bxslider.min.js"></script>
<script src="style/js/imgLiquid-min.js"></script>
<script src="style/js/jquery.tooltipster.min.js"></script>
<script src="style/js/jquery.easypiechart.min.js"></script>
<script src="style/js/waypoints.min.js"></script>
<script src="style/js/wow.min.js"></script>
<script src="style/js/menu.js"></script>
<script src="style/js/main.js"></script>
<script type="text/javascript" src="style/jsme/autogoogle.js"></script>
<script type="text/javascript" src="style/jsme/jquery-ui.js"></script>
<script src="style/js/forms.js"></script>
<script src="style/jsme/login.js"></script>
<script type="text/javascript" src="style/jsme/custom-slideshow.js"></script>
 {FILE {TEMPLATELOGIN}}
<style>
	.ui-autocomplete {
			 z-index: 10000000;
	}
	#hover_cai li a:hover #menu_con{ display: block; width: 250px; height: 300px; z-index: 999909999;}
</style>

</body>
</html>

<!-- END:main -->