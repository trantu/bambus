<!-- BEGIN:main -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script>
    var ICONPRICE='{ICONPRICE}';
    var PRICEMIN={PRICEMIN};
    var FGSUCCESS='{FGSUCCESS}';
    var FGERROR='{FGERROR}';
    var SGERROR='{SGERROR}';
    </script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HQ TECH</title>
<link href="style/css/style-mobile.css" rel="stylesheet" type="text/css" />
<link href="style/css/m_login.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="style/js/danhmuc-menu-jquery.js"></script>
<script type="text/javascript" src="style/js/jquery-1.9.1.js"></script>

<script type="text/javascript" src="style/js/jqueryTab.js"></script>
<script type="text/javascript" src="style/js/m_append-beilage.js"></script>

<script type="text/javascript" src="style/js/m_main.js"></script>
</head>

<body>

<div class="index-in">
	<div class="opacity-body"></div>
    <div class="indexheader-in">
    	<div class="logo"><a href="index.php?mod=m/home"><img src="style/images/logo.png" alt="" /></a></div>
        <div class="login">
        	<ul>
            	<li class="active"><a href="#"><span>KONTAKT</span></a></li>
                <!-- BEGIN:login -->
                <li class="action-login"><a href="#"><span>{SLOGIN}</span></a></li>
                <!-- END:login -->

                <!-- BEGIN:loginsession -->
                <li class="action-logins"><a href="index.php?mod=m/history_order"><span>{SACCOUT}</span></a></li>
                <li class="action-logout"><a href="index.php?mod=m/logout"><span>{SLOGUOT}</span></a></li>
                <!-- END:loginsession -->

            </ul>
        </div>
        <div class="titin">
        	<p>Klick ein Gericht an, um es in den Warenkorb zu legen</p>
        </div>

    </div>
    <div class="indexcontent">
    	<div class="content">
            <div class="container">
                <ul class="tabs">
                    <li class="t-1"><a href="#tab1"><span>{MSPEISEKARTE}</span></a></li>
                    <li class="t-2"><a href="#tab2"><span>{MBEWERTUNGEN}</span></a></li>
                    <li class="t-3"><a href="#tab3"><span>{MINFO}</span></a></li>
                </ul>
                <div class="tab_container">
                    <div style="display: block;" id="tab1" class="tab_content">
                        <div class="contin">
                        	<div class="spei">
                                <div class="contlist">
                                	<div class="productMenu">
                                        <ul class="cap1">
                                            <!-- BEGIN:gruppe -->
                                            <li>
                                                <a href="#"><span>{NAMEGRUPPE}</span></a>
                                                <ul class="cap2">
                                                	<li>
                                                        <div class="cc-boxlist">

                                                    <!-- BEGIN:list -->
                                                        <div class="list appends" idSP="{IDSP}">

                                                            <ul>
                                                                <li class="list-1"><a href="#" >(NR. {IDSP}) {NAME}</a></li>
                                                                <li class="list-2">
                                                                    <a href="#" >
                                                                        <img src="style/images/icon-9.png" alt="" />
                                                                    </a>
                                                                </li>
                                                                <li class="list-3"><a href="#">{PRICE}{ICONPRICE}</a></li>
                                                                <li class="list-4"><a href="#" >{NAMEONLINE}</a></li>
                                                            </ul>

                                                            <div class="note_ones">
                                                                <h3>{NOTE}</h3>
                                                                <p>{NOTECONTENT}</p>
                                                                <textarea class="note-text" placeholder="{NOTEPLACEHOLDER}"></textarea>
                                                                <div style=" display:block;text-align:center; height:33px;margin-top:10px;margin-bottom:10px;margin-left: 34%;">
                                                                    <button href="#" idSP="{IDSP}" class="button  green close note-ok">
                                                                        <img src="style/images/tick.png">{NOTEBUTTON}
                                                                    </button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                      <!-- END:list -->
                                                      <!-- BEGIN:lists -->
                                                      <div class="list" idSP="{IDSP}" >
                                                            <ul>
                                                                <li class="list-1"><a href="#" >(NR. {IDSP}) {NAME}</a></li>
                                                                <li class="list-2">
                                                                    <a href="#" class="appends-beilage"  item="{COUNT_DISHIS}">
                                                                        <img  src="style/images/icon-9.png" alt="" />
                                                                    </a>
                                                                </li>
                                                                <li class="list-3"><a href="#">{PRICE}{ICONPRICE}</a></li>
                                                                <li class="list-4" ><a href="#">{NAMEONLINE}</a></li>
                                                            </ul>

                                                            <div class="beilage-list list" >
                                                                <h3 style="text-align:center;margin-top:5px;font-size:4em;background:#FFF;"> {SIDEDISH}</h3>
                                                                <div class="count_ds">
                                                                <!-- BEGIN:demdishis -->
                                                                    <p class="count_ds{DEM_DS} count_ds_c">{STEP} {DEM_DS} </p>
                                                                <!-- END:demdishis -->
                                                                </div>

                                                                <!-- BEGIN:beilage -->

                                                                    <ul beilage="{BEILAGE}" style="display:none;" price="{PRICES}" idSP="{BEILAGE}{IDSP}" idSPs="{IDSP}" classCLick="{CLASSDS}" onceclass="{GROUPCLASS}class" class="beilage-clickss  {GROUPCLASS}class" display="{DISPLAY_DS}">

                                                                        <li class="list-1s" >
                                                                            <input type="checkbox" style="float:right" class='{GROUPCLASS}classinputs'  idSPs="{IDSP}" price="{PRICES}" value="{BEILAGE}" />
                                                                        </li>

                                                                        <li class="list-3s">
                                                                            <a href="#" style="text-decoration:none;font-weight:bold;font-size:17px;">{BEILAGE}
                                                                            </a>
                                                                        </li>

                                                                        <li class="list-2s">
                                                                            <a href="#" style="text-decoration:none;font-size:17px;">{PRICES}{ICONPRICE}
                                                                            </a>
                                                                        </li>

                                                                         <br><hr>
                                                                    </ul>
                                                                <!-- END:beilage -->

                                                                <div style="clear:both;display:block;height:33px;margin-top:10px;margin-bottom:15px;">
                                                                    <a href="#" class="button green close backds">
                                                                        <img src="style/images/tick.png">Back
                                                                    </a>
                                                                    <button href="#" class="button  green close boquads">
                                                                        <img src="style/images/tick.png" >
                                                                        <p>Next</p>
                                                                    </button>
                                                                    <a href="#" class="button green close quitds">
                                                                        <img src="style/images/cross.png">Quit
                                                                    </a>
                                                                </div>
                                                                <p class="error-beilage" style="color:red;width:100%; text-align:center;font-size:14px;margin-bottom:10px;"></p>

                                                            </div>

                                                            <div class="note_ones">
                                                                <h3>{NOTE}</h3>
                                                                <p>{NOTECONTENT}</p>
                                                                <textarea class="note-text" placeholder="{NOTEPLACEHOLDER}"></textarea>
                                                                <div style=" display:block;text-align:center; height:33px;margin-top:10px;margin-bottom:10px;margin-left: 34%;">
                                                                    <button href="#" idSP="{IDSP}" class="button  green close note-ok-beilage">
                                                                        <img src="style/images/tick.png">{NOTEBUTTON}
                                                                    </button>
                                                                </div>
                                                            </div>

                                                    </div>
                                                    <!-- END:lists -->

                                                    </div>
                                                	</li>
                                                </ul>
                                            </li>
                                            <!-- END:gruppe -->
                                        </ul>
                                	</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="display: block;" id="tab2" class="tab_content">
                        <div class="xanh">b
                        </div>
                    </div>
                    <div style="display: none;" id="tab3" class="tab_content">
                        <div class="xanh">c
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="indextopfoot2">
    	<div class="topfoot2">
        	<div class="topfoot2-1">
            	<ul>
                	<li> <!-- BEGIN:addressstore -->
                        <a href="#">{NAMESTORE}</a></br>
                        <a href="#">{ADDRESSSTORE}</a></br>
                        <a href="#">{REGIONSTORE}</a>
                        <!-- END:addressstore -->
                    </li>
                </ul>
            </div>
            <div class="topfoot2-2" style="overflow:hidden;">
                <ul style="margin-left:-3.8em;">
                    <li style="background:none;">
                        <!-- BEGIN:contactus -->
                        <a href="#">{TELEPHONE}</a></br>
                        <a href="#">{EMAILCONTACT}</a>
                        <!-- END:contactus -->
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>


<!-- popup login -->
<div id="signup" style="position: fixed; opacity: 1; z-index: 11000000; left:4%;width:96%;height:65em; margin-left:-2%; top:5%;">
    <div id="signup-ct">
        <div id="signup-header">
            <h2 style="font-size: 4em;">{SGTITLE}</h2>
            <p  style="font-size:2.8em;">{SGTITLEP} <a class="ins-popupregister" href="index.php?mod=m/register" style="color:red;font-size:1.4em;">{SGTITLEREGISTER}</a></p>
            <a class="modal_close cancel" href="#"></a>
        </div>

        <form id="sm-login">

          <div class="txt-fld">
            <label for="">{SGEMAIL}</label><br>
            <input id="login-email" class="good_input" name="login-email" type="email" required placeholder="{SGEMAILP}" >
          </div>

          <div class="txt-fld">
            <label for="">{SGPASSWORD}</label><br>
            <input id="login-password" name="login-password" type="password" required placeholder="{SGPASSWORDP}">
          </div>

          <div class="txt-fld">
            <a  href="#" class="forget-pass"><label> {SGFGPASS}</label><br> </a>
          </div>
          <div class="btn-flds" style="text-align:center; padding-bottom:16px;">
              <div style="text-align:center;padding-top:7px;">
                <button type="submit" id="login-button">{SGBTSIGNUP}</button>
                <a href="index.php?mod=m/register"><button type="button" class="ins-popupregister">{SGBTRGTER}</button></a>
              </div>
          </div>

        </form>

    </div>
</div>


<div class="indextopfoot4">
		<span><a href="index.php?mod=m/cart" class="f-1 {STTCART}"><img src="style/images/giohang.png" alt="" /></a> {CMINIMUM}: {PRICEMIN},00{ICONPRICE}-{CQTY}: <a href="#" class="f-2 total_dishis">{TOTAL_DISHIS} </a> : <a href="#" class="f-3 sum_total">{TOTAL}{ICONPRICE}</a></span>
</div>



<!--<div class="orderminmax">
    <div id="signup-header-min" style="text-align:center;">
        <h2 style="font-size:3em"> You must order min {PRICEMIN} {ICONPRICE}</h2>
         <a class="modal_close cancel-orderminmax" href="#"></a>
    </div>
</div>
-->


<div class="formpassword" >
    <div id="signup-header" style="text-align:center;height:auto;">
        <h2 style="font-size:3em"> {FGTITLE}</h2>
        <a class="modal_close cancel-forget" href="#"></a>
    </div>
    <form  id="form-forgetpass" style="text-align:center">
        <input type="email" style="margin-top:1em;" id="email-forget" name="email-forget" placeholder="{FGPLACE}" />
        <input type="submit" value="{FGBUTTON}" id="sb-forget"  style="margin-top:1em;padding: 0.9em 1em;"/><br><br>
    </form>
</div>

<!-- BEGIN:timeout -->
<div class="orderminmaxs" style="z-index:9999;">
    <div id="signup-header" style="text-align:center; height:18em;z-index:9999;">
        <h2 style="font-size:6em;margin-bottom:1.5em;">{TTIMEOUT}</h2><br>
        <button class="orderfirst" style="font-size:2.5em;padding: 0.9em 2.5em;margin-right:1em ;"> {TTORDER}</button>
        <button class="seeit" style="font-size:2.5em;padding: 0.9em 2.5em;">{TTSEE}</button>
    </div>

</div>
 <div class="opacity-body" style="display:block"></div>
<!-- END:timeout -->

<!-- BEGIN:checkstress -->
<style>
    .appends{display: none;}
    .appends-beilage{display: none;}
</style>

<!-- END:checkstress -->

</body>
</html>
<!-- END:main -->
