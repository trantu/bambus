<?php  
#trang chinh shop
if(!defined('SECURITY')) exit('404 - Not Access'); 
	
	$xtpl=new XTemplate(TEMPLATE.'about.tpl');


	if(isset($_SESSION['price_distance'])){
		$xtpl->assign("PRICEMIN",$_SESSION['price_distance']);
	}

	include('inc/header.php');	
	
#end hiển thị địa chỉ thông tin trên

#lay tong tien mon an
	$total_temp=(isset($_SESSION['total']))? $_SESSION['total']:0;
	$total=number_format($total_temp,2,',','.');
	$xtpl->assign("TOTALCART",$total);
	$total_dishis=(isset($_SESSION['total_dishis']))? $_SESSION['total_dishis']:0;
	$xtpl->assign("TOTALDISHISCART",$total_dishis);


    $xtpl->assign('TITLE',$config['namestore']);
    $xtpl->assign('FAVICON_ICO',$config['favicon_ico']);
	
	$xtpl->assign('LANGUAGEMENU',$de_menu);
	$xtpl->assign('LANGUAGEFOOTER',$de_footer);
	$xtpl->assign('LANGUAGELOGIN',$de_login);
	
	$xtpl->assign("ICONPRICE",$config['iconprice']);
	$xtpl->assign_file("TEMPLATEHEADER",TEMPLATE.'header/header.tpl');
	$xtpl->assign_file("TEMPLATEFOOTER",TEMPLATE.'footer/footer.tpl');	
	$xtpl->assign_file("TEMPLATELOGIN",TEMPLATE.'login/login.tpl');	
	$xtpl->parse("main");
	$xtpl->out("main");