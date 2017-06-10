<!-- BEGIN:main -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script>
        var PRICEMIN={PRICEMIN};
    </script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HQ TECH</title>
<link href="style/css/style-mobile.css" rel="stylesheet" type="text/css" />
<link href="style/css/m_login.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="style/js/danhmuc-menu-jquery.js"></script>
<script type="text/javascript" src="style/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="style/js/jqueryTab.js"></script>
<script type="text/javascript" src="style/js/m_cart.js"></script>
</head>

<body>

<div class="index-in" style="padding-bottom:0px;">

    <div class="indexheader-in">
    	<div class="logo"><a href="index.php?mod=m/main"><img src="style/images/logo.png" alt="" /></a></div>
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
            <div class="giohang" style="width:100%;">
                            <div class="tt-giohang"><p>Warenkorb</p><a href="index.php?mod=m/unsetCart"><img width="80"  height="80" src="style/images/bin.png" alt="" /></a></div>
                            <div class="cc-giohang">
                            <!-- BEGIN:cart -->
                            	<div class="sum-01" style="width:100%; float:left; padding:10px 0;">
                                	<ul style="list-style:none;">
                                    	<li style="width:160px; float:left;">
                                        	<span style="width:48px; height:48px; border:1px solid #ddd; float:left; text-align:center; line-height:48px; background:white; font-size:40px;" class="quantity{IDSP}">{QTY}</span>
                                            <a href="#" style="float:left; margin:0 0 0 10px" class='append'  idSP='{IDSP}'
                                                onclick="{
                                                var idSP='{IDSP}';
                                                    $.ajax({
                                                            type:'POST',
                                                            url:'index.php?mod=j_add',
                                                            data:'idSP='+ idSP,
                                                            success:function(smgs){
                                                                $('.sum_total').html(smgs + '{ICONPRICE}');
                                                                $.ajax({
                                                                    type:'POST',
                                                                    url:'index.php?mod=j_qtyID',
                                                                    data:'idSP='+ idSP,
                                                                    success:function(smgs){
                                                                        $('#order_summary').css('display','block');
                                                                        $('.quantity{IDSP}').html(smgs);
                                                                        var pr=parseFloat(smgs);
                                                                        var prices=(pr*{PRICE}).toFixed(2);
                                                                        var pricess=prices.replace('.',',');
                                                                        $('.price{IDSP}').html(pricess + '{ICONPRICE}');
                                                                    }
                                                                });
                                                            }
                                                        });return false;
                                                    }">
                                                <img src="style/images/cong.jpg" alt="" width="40"  height="49" />

                                            </a>

                                            <a href="#" style="float:left; margin:0px 0 0 15px;"class='remove' idSP='{IDSP}'
                                                onclick="{var divdel=$(this).closest('div');
                                                var idSP='{IDSP}';
                                                    $.ajax({
                                                            type:'POST',
                                                            url:'index.php?mod=j_delete',
                                                            data:'idSP='+ idSP,
                                                            success:function(smgs){
                                                                $('.sum_total').html(smgs + '{ICONPRICE}');
                                                                $.ajax({
                                                                    type:'POST',
                                                                    url:'index.php?mod=j_qtyID',
                                                                    data:'idSP='+ idSP,
                                                                    success:function(smg){
                                                                        if(smg>0){
                                                                            $('.quantity{IDSP}').html(smg);
                                                                            var pricesr=(smg*{PRICE}).toFixed(2);
                                                                            var pricessr=pricesr.replace('.',',');
                                                                            $('.price{IDSP}').html(pricessr + '{ICONPRICE}')
                                                                        }
                                                                        if(smg==0) {
                                                                            divdel.remove();
                                                                        }
                                                                    }
                                                                });
                                                            }
                                                        });return false;}">
                                                <img src="style/images/tru.jpg" alt="" width="40" height="49" />
                                            </a>
                                        </li>
                                        <li style=" width:80%; float:right;">
                                        	<p style="float:left; width:60%; margin-left:20px; line-height:26px; display:block; height:26px; font-size:30px;">(NR. {IDSP}) {NAME}  {BEILAGE}</p>
                                            <span style=" width:28%; text-align:right; line-height:26px; float:right; font-size:30px;" class="price{IDSP}" >{PRICES} {ICONPRICE}</span>
                                        </li>
                                    </ul>
                                </div>
                            <!-- END:cart -->

                                <div class="sum-0">
                                    <ul>
                                        <li class="sum-1"><a href="#">{CSUMME}</a></li>
                                        <li class="sum-2"><a href="#" class="sum_total">{TOTAL} {ICONPRICE}</a></li>
                                    </ul>
                                </div>
                                <div class="zur" style="padding-top:20px;"><a href="#"><span style="background:#0C0; font-size:30px;">{CBUTTON}</span></a></div>
                                <div class="nganhang">
                                    <ul>
                                        <li><a href="#"><img src="style/images/n-1.jpg" alt="" /></a></li>
                                        <li><a href="#"><img src="style/images/n-2.jpg" alt="" /></a></li>
                                        <li><a href="#"><img src="style/images/n-3.jpg" alt="" /></a></li>
                                        <li><a href="#"><img src="style/images/n-4.jpg" alt="" /></a></li>
                                        <li><a href="#"><img src="style/images/n-5.jpg" alt="" /></a></li>
                                        <li><a href="#"><img src="style/images/n-6.jpg" alt="" /></a></li>
                                        <li><a href="#"><img src="style/images/n-1.jpg" alt="" /></a></li>
                                        <li><a href="#"><img src="style/images/n-2.jpg" alt="" /></a></li>
                                        <li><a href="#"><img src="style/images/n-3.jpg" alt="" /></a></li>
                                        <li><a href="#"><img src="style/images/n-4.jpg" alt="" /></a></li>
                                        <li><a href="#"><img src="style/images/n-5.jpg" alt="" /></a></li>
                                        <li><a href="#"><img src="style/images/n-6.jpg" alt="" /></a></li>
                                    </ul>
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
            <div class="topfoot2-2">
                <ul>
                    <li>
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



    <div class="orderminmax">
        <div id="signup-header-min" style="text-align:center;">
            <h2 style="font-size:3em"> {PRICEMINTITLE} {PRICEMIN} {ICONPRICE}</h2>
             <a class="modal_close cancel-orderminmax" href="#"></a>
        </div>
    </div>
 <div class="opacity-body" ></div>
</body>
</html>
<!-- END:main -->
