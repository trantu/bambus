BEGIN:main -->
<meta charset="UTF-8">
    <title>{TITLE} | Paypal</title>
    <link rel="stylesheet" href="style/css/style.css">
    <link rel="stylesheet" href="style/css/animate.css">
    <link rel="stylesheet" href="style/css/tooltipster.css">
    <link rel="stylesheet" href="style/css/custom.css">
    <link href="style/css/jquery-ui.css" rel="stylesheet" type="text/css" /
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <!-- favicon -->
    <link rel="icon" href="{FAVICON_ICO}">
</head>
<body>

    <header>

        <div id="header-top-wrap">
            <section id="header-top">
                <a href="mailto:{EMAILCONTACT}">{EMAILCONTACT}</a>
                <p>{TELEPHONE}</p>
                <!-- <ul class="social">
                    <li><a href="#" class="social-icon fb"></a></li>
                    <li><a href="#" class="social-icon twt"></a></li>
                    <li><a href="#" class="social-icon gplus"></a></li>
                </ul> -->
                <article id="login">
                    {TEXTPOSITIONLOGIN}
                </article>
            </section>
        </div>

        <div id="main-nav-wrap">
            <nav id="main-nav">
                <a href="index.php">
                    <figure>
                        <img  src="style/images/logo-banner.png" alt="logo">
                        <figcaption>Red Samurai</figcaption>
                    </figure>
                </a>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php?mod=about">About</a></li>                  
                    <li ><a href="index.php?mod=main">Shop</a></li>
                    <li class="sub-items cart-items"><a href="#">Cart<span class="cart total_dishis">{TOTALDISHISCART}</span></a>
                        <ul>
                            <li><p>Your Item(s):<span class="total_dishis">{TOTALDISHISCART}</span></p></li>
                            <li><p>Total:<span class="sum_total ">{TOTALCART}</span></p></li>
                            <li><a href="index.php?mod=checkout" class="button red">Proceed to Checkout</a>
                            <img src="style/images/menu-logo.png" alt="logo">
                            <p class="greet">Thanks for your Purchase!</p>
                            <!--<img src="style/images/menu-serrated-border.png" alt="serrated-border" >-->
                            </li>
                            <div class="container"></div>
                        </ul>

                    </li>
                    <li><a href="index.php?mod=contact">Contact</a></li>
                </ul>
                <a href="#" id="pull"></a> 
            </nav>
        </div>
        <!--/MAIN-NAV-->

        <!--HEADER-BOTTOM-->
        <div id="header-bottom-wrap">
            <section id="header-bottom" class="small">
                <h1 class="wow fadeInLeft">Try Our New<br><span class="remarked gold">Pork Harumaki</span></h1>
                <a href="#" class="order wow bounceInDown" data-wow-delay=".5s">Go to Cold Entrees</a>
            </section>  
        </div>
        <!--/HEADER-BOTTOM-->
    </header>
    <!--/HEADER-->

        <div class="indexcontent">
        	<div class="content">
                <div class="contin">
                    <div class="spei">
                        <div class="menuleft"  style="width:98%; float:left;">
                    		<div id="pp-register">
                                 <div id="signup-header" style="text-align:center;">
                                    <h2>{PPTITLE}</h2>
                                    <p>{PPTITLEP}<a href="index.php?mod=main"> {PPTITLEA} </a> {PPTITLEPN} </p>
                                </div>

                                <div id="ip-register"  style="text-align:center;font-family: 'PT Sans Narrow', sans-serif;">
                                    <h3 style="font-size:24px;padding-top:30px;margin-bottom:20px;">{IFTITLEADDRESS}</h3>
                                        <table border="1px" style="width:700px;margin:0px auto;text-align:center; ">
                                            <tr> 
                                               <th>{IFNAME}</th> 
                                               <th>{IFSTRESS}</th>
                                               <th>{IFPHONE}</th>
                                            </tr>
                                            <tr> 
                                               <td>{NAMEUSER}</td>
                                               <td>{ADDRESSUSER}</td>
                                               <td>{PHONEUSER}</td>
                                            </tr>
                                            
                                        </table>
                                    </div>
                                </div>
                                <!-- BEGIN:people -->
                                <div id="ip-register" style="text-align:center;">
                                    <h3 style="font-size:24px;padding-top:30px;margin-bottom:20px;">{LTITLECART}{NUMBER}</h3>
                                    <table border="1px" style="width:700px;margin:0px auto;text-align:center; ">
                                        <tr> 
                                           <th>{LNAME}</th> 
                                           <th>{LQTY}</th>
                                           <th>{LTOTALPRICE}</th>
                                           <th>{LBEILAGE}</th>
                                           <th>{LNOTE}</th>
                                        </tr>
                                        <!-- BEGIN:cart -->
                                        <tr> 
                                           <td>{NAME}</td>
                                           <td>{QTY}</td>
                                           <td>{PRICES} {ICONPRICE}</td>
                                           <td>{BEILAGE}</td>
                                           <td>{NOTE}</td>
                                        </tr>
                                        <!-- END:cart -->
                                        <tr>
                                            <td colspan="2">{LTOTAL}</td>
                                            <td colspan="2">{TOTAL} {ICONPRICE}</td>
                                         </tr>
                                    </table>
                                </div>
        						 <!-- END:people --> 
    						</div>
                        </div>
                                                                        
                    </div>
                </div>
            </div>
    </div>
    <!--FOOTER-->
    <div id="footer-wrap" style="background-color: {HEADER_COLOR}">
        <footer >
            <article>
                <p  style="float:none;text-align:center;">The <span>Red</span> Samurai <span class="copy">- All rights reserved 2014</span></p>
               <!--  <ul class="social">
                    <li><a href="#" class="social-icon fb"></a></li>
                    <li><a href="#" class="social-icon twt"></a></li>
                    <li><a href="#" class="social-icon gplus"></a></li>
                    <li><a href="#" class="social-icon rss"></a></li>
                    <li><a href="#" class="social-icon vimeo"></a></li>
                    <li><a href="#" class="social-icon flickr"></a></li>
                </ul> -->
            </article>
        </footer>
    </div>
    <!--/FOOTER-->

    <!-- BEGIN:timeout -->
    <article class="form-box reset" id="pricemin_error" style='display:block;'>
        <a href="#" class="form-close form_close_time">
            <img src="style/images/form-close.png" alt="close">
        </a>
        <img src="{FORM_LOGO}" alt="logo">
        <p class='show_error_price' style='color:red;font-size:1em;font-weight:bold;'>{TOTITLE}</p>
    </article>

    <style>
        .form-box-overlay{display: block;}
        .confirm_order,.cart-items{display: none !important;}
    </style>
    <!-- END:timeout -->

</body>
</html>
<!-- End:main