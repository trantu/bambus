<?php
if(!defined('SECURITY')) exit('404 - Not Access'); 	
	$xtpl=new XTemplate(TEMPLATE.'register.tpl');
	$rule=new Rule;
	require_once("j_all.php");
	$j_all=new j_all;

	$xtpl->assign('LANGUAGEREGISTER',$de_register);
	$xtpl->assign('LANGUAGEMAIN',$de_main);
	$xtpl->assign('LANGUAGECART',$de_cart);

    $xtpl->assign('FORM_LOGO',$config['cart_logo']);
    $xtpl->assign('FAVICON_ICO',$config['favicon_ico']);

	if(isset($_POST['email'])){
		$regis=$j_all->register();
		if($regis){
			$xtpl->assign('REGISTERSTATUS',$de_register['register_success'].'<a href="index.php?mod=main">'.$de_register['click_toshop'].'</a>');
		}
		else{
			$xtpl->assign('REGISTERSTATUS',$de_register['register_error']);
		}
		$xtpl->parse("main.success");
	}

	include('inc/header.php');

#lay tong tien mon an
	$total_temp=(isset($_SESSION['total']))? $_SESSION['total']:0;
	$total=number_format($total_temp,2,',','.');
	$xtpl->assign("TOTALCART",$total);
	$total_dishis=(isset($_SESSION['total_dishis']))? $_SESSION['total_dishis']:0;
	$xtpl->assign("TOTALDISHISCART",$total_dishis);	

	//khi khach hang post.tức đăng ký
	if(isset($_POST['email'])){
		$xtpl->assign("EMAILUSER",$_POST['email']);
		$xtpl->assign("FIRSTNAMEUSER",$_POST['firstname']);
		$xtpl->assign("LASTNAMEUSER",$_POST['lastname']);
		$xtpl->assign("STRESSUSER",$_POST['stress']);
		$xtpl->assign("OFFICEUSER",$_POST['office']);
		$xtpl->assign("NUMBERHOUSEUSER",$_POST['numberhouse']);
		$xtpl->assign("NOTEPOSITIONUSER",$_POST['noteposition']);
		$xtpl->assign("POSTALCODEUSER",$_POST['postalcode']);
		$xtpl->assign("REGIONUSER",$_POST['region']);
		$xtpl->assign("COMPANYUSER",$_POST['company']);
		$xtpl->assign("PHONEUSER",$_POST['phone']);
		$xtpl->assign("NOTEUSER",$_POST['note']);
		//$xtpl->assign("STRESSOLD",$_SESSION['addresold']);
		if($_POST['sex']==1){
		$xtpl->assign('IFMALE','checked');
		$xtpl->assign('IFFEMALE','');
		}
		else{ 
			$xtpl->assign('IFMALE','');
			$xtpl->assign('IFFEMALE','checked');
		}
	}
	
	$xtpl->assign('LANGUAGEMENU',$de_menu);
	$xtpl->assign('LANGUAGEFOOTER',$de_footer);
	$xtpl->assign('LANGUAGELOGIN',$de_login);
    $xtpl->assign("DISCOUNTTEXT",$config['discount_text']);
	
	$xtpl->assign_file("TEMPLATEHEADER",TEMPLATE.'header/header.tpl');
	$xtpl->assign_file("TEMPLATEFOOTER",TEMPLATE.'footer/footer.tpl');	
	$xtpl->assign_file("TEMPLATELOGIN",TEMPLATE.'login/login.tpl');	
	$xtpl->assign("ICONPRICE",$config['iconprice']);
	$xtpl->parse("main");
	$xtpl->out("main");

	

