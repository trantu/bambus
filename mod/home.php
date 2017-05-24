<?php
# Home index.mặc định khi vào trang
if(!defined('SECURITY')) exit('404 - Not Access');

$rule= new Rule;
$time=$config['time_in_web'];
#xu ly sau phan cookie dang nhap sau
$xtpl = new XTemplate(TEMPLATE.'home.tpl');
//unset($_SESSION['price_distance']);
$xtpl->assign('LANGUAGEMAIN',$de_main);

include('inc/header.php');	
if(isset($_SESSION['addresold'])){
	$address_old=$_SESSION['addresold'];
	$xtpl->assign("ADDRESSOLD",$address_old);
}

$xtpl->assign('TITLE',$config['namestore']);
$xtpl->assign('FAVICON_ICO',$config['favicon_ico']);

$telephone=$config['telephone_store'];
$email=$config['email_store'];
$xtpl->assign("TELEPHONE",$telephone);
$xtpl->assign("EMAILCONTACT",$email);

#lay tong tien mon an
$total_temp=(isset($_SESSION['total']))? $_SESSION['total']:0;
$total=number_format($total_temp,2,',','.');
$xtpl->assign("TOTALCART",$total);
$total_dishis=(isset($_SESSION['total_dishis']))? $_SESSION['total_dishis']:0;
$xtpl->assign("TOTALDISHISCART",$total_dishis);


//load ngon ngu
$xtpl->assign('LANGUAGEHOME',$de_home);
$xtpl->assign('LANGUAGEMENU',$de_menu);
$xtpl->assign('LANGUAGEFOOTER',$de_footer);
$xtpl->assign('LANGUAGELOGIN',$de_login);
//load template
$xtpl->assign("ICONPRICE",$config['iconprice']);
$xtpl->assign_file("TEMPLATEHEADER",TEMPLATE.'header/header.tpl');
$xtpl->assign_file("TEMPLATEFOOTER",TEMPLATE.'footer/footer.tpl');
$xtpl->assign_file("TEMPLATELOGIN",TEMPLATE.'login/login.tpl');



$xtpl->parse('main');
$xtpl->out('main');