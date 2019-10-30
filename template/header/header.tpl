		<!--HEADER-TOP-->
		<div id="header-top-wrap">
			<section id="header-top">
				<a class="map col_sm_100">{ADDRESSSTORE.address}, {ADDRESSSTORE.region}</a>
				<!--<a class="home col_sm_100">{ADDRESSSTORE.name}</a> -->
				<a href="mailto:{EMAILCONTACT}" class="col_sm_100">{EMAILCONTACT}</a>
				<p>{TELEPHONE}</p>
				<a class="time col_sm_100" style='font-size:15px'>{TIMEDAYWORK}</a>

                <article id="login" class="col_sm_100">
					{TEXTPOSITIONLOGIN}
				</article>
			</section>
		</div>
		<!--/HEADER-TOP-->
		<!--MAIN-NAV-->
		<div id="main-nav-wrap" style="background-color: {HEADER_COLOR};">
			<nav id="main-nav">
				<a href="#" id="click_show_address">
					<figure>
						<img  src="{LOGO_BANNER}" alt="logo">
						<figcaption>Red Samurai</figcaption>
					</figure>
				</a>
				<ul>
					<li><a href="index.php" class="{MODMENU.home} ">{LANGUAGEMENU.home}</a></li>
					<li class="menu_hide_shows"><a href="index.php?mod=about" class="{MODMENU.about} ">{LANGUAGEMENU.about}</a></li>
					<li><a href="index.php?mod=main" class="{MODMENU.main}">{LANGUAGEMENU.shop}</a></li>
					<li class="checkout-desktop"><a  href="index.php?mod=checkout">{LANGUAGEMENU.cart}<span class="cart total_dishis">{TOTALDISHISCART}</span></a></li>
					<li class="sub-items cart-items" id="hover_cai" >
						<a href="index.php?mod=checkout" style="border-bottom: 4px solid {HEADER_COLOR} !important;" class="hover_di {MODMENU.checkout}">{LANGUAGEMENU.cart}<span class="cart total_dishis">{TOTALDISHISCART}</span></a>
						<ul id="menu_con" style=" background-color: {HEADER_COLOR}" >
							<li><p>{LANGUAGEMENU.cart_item}:<span class="total_dishis">{TOTALDISHISCART}</span></p></li>
							<li><p>{LANGUAGEMENU.cart_total}:<span class="sum_total ">{ICONPRICE}{TOTALCART}</span></p></li>
							<li>
								<a href="index.php?mod=checkout" class="button red">{LANGUAGEMENU.cart_checkout}</a>
								<img src="style/images/menu-logo.png" alt="logo">
								<p class="greet">{LANGUAGEMENU.cart_thankyou}</p>
								<!--<img src="style/images/menu-serrated-border.png" alt="serrated-border" >-->
							</li>
							<div class="container"></div>
						</ul>
					</li>
					<li class="menu_hide_shows_contact"><a href="index.php?mod=contact" class="{MODMENU.contact}">{LANGUAGEMENU.contact}</a></li>
				</ul>
				<a href="#" id="pull"></a>
			</nav>
		</div>

		<!--/MAIN-NAV-->
		<!--HEADER-BOTTOM-->
		<div id="header-bottom-wrap">
		<!--
		<div class="w3-content w3-section" style="max-width:500px; max-height:100px">
          <img class="mySlides w3-animate-right" src="upload/slideshow/ebi-io.jpg" style="width:100%">
          <img class="mySlides w3-animate-right" src="upload/slideshow/ente-garnelen.jpg" style="width:100%">
          <img class="mySlides w3-animate-right" src="upload/slideshow/Reisbandnudeln-Kategorie.jpg" style="width:100%">
          <img class="mySlides w3-animate-right" src="upload/slideshow/unagi-io.jpg" style="width:100%">
        </div>
        -->
            <!--
			<section id="header-bottom">
				<h1 class="wow fadeInLeft">{LANGUAGEHOME.the_best}
					<span class="remarked">{LANGUAGEHOME.asian_cuise}</span>
					<span class="right">{LANGUAGEHOME.in_all}</span>
				</h1>
				<!-- <a href="index.php?mod=main" class="order wow bounceInDown" data-wow-delay=".5s">{LANGUAGEHOME.start_you}</a> -->
				<!-- <img src="style/images/rabatt-text.png" style="width:50%;height:15%;" alt="rabatt-text" class="wow fadeInRight"> -->
			</section>
			-->
		</div>
		<!--/HEADER-BOTTOM-->
		<style>
			{STYLEMENU}
		</style>
