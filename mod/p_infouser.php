<?php  
//lay thong tin user và chinh sửa
if(!defined('SECURITY')) exit('404 - Not Access'); 	
	$xtpl=new XTemplate(TEMPLATE.'p_infouser.tpl');
	$rule=new Rule;
	require_once("j_all.php");
	$j_all=new j_all;

	$xtpl->assign('LANGUAGEREGISTER',$de_register);
	$xtpl->assign('LANGUAGEMAIN',$de_main);
	$xtpl->assign('LANGUAGECART',$de_cart);
	include('inc/header.php');
	if(!isset($_SESSION['Email'])){
		header('location:index.php');
	}

	if(isset($_POST['email'])){
		$abc=$j_all->updateuser();
		$xtpl->assign('IFUPDATESUCCESS',$history['info']['updatesuccess']);
		$xtpl->parse("main.success");
		header('location:index.php?mod=main');
	}

    $xtpl->assign('TITLE',$config['namestore']);
    $xtpl->assign('FAVICON_ICO',$config['favicon_ico']);

	# hiển thị địa chỉ thông tin trên
	$telephone=$config['telephone_store'];
	$email=$config['email_store'];
	$xtpl->assign("TELEPHONE",$telephone);
	$xtpl->assign("EMAILCONTACT",$email);
	#end hiển thị địa chỉ thông tin trên


#lay tong tien mon an
	$total_temp=(isset($_SESSION['total']))? $_SESSION['total']:0;
	$total=number_format($total_temp,2,',','.');
	$xtpl->assign("TOTALCART",$total);
	$total_dishis=(isset($_SESSION['total_dishis']))? $_SESSION['total_dishis']:0;
	$xtpl->assign("TOTALDISHISCART",$total_dishis);	



	$rowuser=$j_all->infoUser($_SESSION['Email']);
	if(count($rowuser)>0){
		$xtpl->assign("EMAILUSER",$rowuser['Email']);
		$xtpl->assign("FIRSTNAMEUSER",$rowuser['Firstname']);
		$xtpl->assign("LASTNAMEUSER",$rowuser['Lastname']);
		$xtpl->assign("STRESSUSER",$rowuser['Stress']);
		$xtpl->assign("OFFICEUSER",$rowuser['Office']);
		$xtpl->assign("NUMBERHOUSEUSER",$rowuser['Numberhouse']);
		$xtpl->assign("NOTEPOSITIONUSER",$rowuser['Noteposition']);
		$xtpl->assign("POSTALCODEUSER",$rowuser['Postalcode']);
		$xtpl->assign("REGIONUSER",$rowuser['Region']);
		$xtpl->assign("COMPANYUSER",$rowuser['Company']);
		$xtpl->assign("PHONEUSER",$rowuser['Phone']);
		$xtpl->assign("NOTEUSER",$rowuser['Note']);
		$xtpl->assign("STRESSOLD",$_SESSION['addresold']);
		if($rowuser['Sex']==1){
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
	$xtpl->assign("ICONPRICE",$config['iconprice']);
	$xtpl->assign("DISCOUNTTEXT",$config['discount_text']);
	$xtpl->assign_file("TEMPLATEHEADER",TEMPLATE.'header/header.tpl');
	$xtpl->assign_file("TEMPLATEFOOTER",TEMPLATE.'footer/footer.tpl');
	$xtpl->assign_file("TEMPLATELOGIN",TEMPLATE.'login/login.tpl');		
	$xtpl->parse("main");
	$xtpl->out("main");

	

