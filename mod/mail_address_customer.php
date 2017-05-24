<?php  
#lay dia chi mail de gui mail
if(!defined('SECURITY')) exit('404 - Not Access'); 	
	$xtpl=new XTemplate(TEMPLATE.'mail_address_customer.tpl');
	$address=$_POST['address'];           

	if(isset($address['address'])){
		$xtpl->assign('NAME',$address['firstname'].$address['lastname']);
		
		$xtpl->assign('PHONE',$address['phone']);
		$xtpl->assign('NOTEPOSITION',$address['noteposition']);
		$xtpl->assign('COMPANY',$address['company']);
		$xtpl->assign('ADDRESS',$address['address']);
		$xtpl->assign('NOTE',$address['note']);
		$xtpl->parse('main.notlogin.address');
	
		$xtpl->assign('IFNOTEPOSITON',$history['info']['noteposition']);
		$xtpl->assign('IFCOMPANY',$history['info']['company']);
		$xtpl->assign('IFPHONE',$history['info']['phone']);
		$xtpl->assign('IFNOTE',$history['info']['note']);
		$xtpl->assign('IFADDRESS','ADDRESS');//SUA CONFIG sau
		$xtpl->assign('IFNAME',$mp['name']);
		$xtpl->assign('IFTITLEADDRESS',$mp['titleaddress']);
		$type_payment=$address['type_payment'];
		$ar_tp=array('1'=>'Cash','2'=>'Paypal','3'=>'Credis Card','4'=>'MobileEC');
		$xtpl->assign('TYPEPAYMENT',$ar_tp["$type_payment"]);//$type_payment
		$xtpl->parse('main.notlogin');

	}
	else{

		$xtpl->assign('NAME',$address['firstname'].$address['lastname']);
		$xtpl->assign("NUMBERHOUSE",$address['numberhouse']);
		$xtpl->assign("STRESS",$address['stress']);
		$xtpl->assign('REGION',$address['region']);
		$xtpl->assign('PHONE',$address['phone']);
		$xtpl->assign('NOTEPOSITION',$address['noteposition']);
		$xtpl->assign('COMPANY',$address['company']);
		$xtpl->assign('POSTALCODE',$address['postalcode']);
		$xtpl->assign('NOTE',$address['note']);
		$type_payment=$address['type_payment'];
		$ar_tp=array('1'=>'Cash','2'=>'Paypal','3'=>'Credis Card','4'=>'MobileEC');
		$xtpl->assign('TYPEPAYMENT',$ar_tp["$type_payment"]);//$type_payment
		$xtpl->parse('main.login.address');

		$xtpl->assign('IFNUMBERHOUSE',$history['info']['numberhouse']);
		$xtpl->assign('IFNOTEPOSITON',$history['info']['noteposition']);
		$xtpl->assign('IFSTRESS',$history['info']['stress']);
		$xtpl->assign('IFREGION',$history['info']['region']);
		$xtpl->assign('IFCOMPANY',$history['info']['company']);
		$xtpl->assign('IFPHONE',$history['info']['phone']);
		$xtpl->assign('IFNOTE',$history['info']['note']);
		$xtpl->assign('IFPOSTAL',$history['info']['postal']);
		$xtpl->assign('IFNAME',$mp['name']);
		$xtpl->assign('IFTITLEADDRESS',$mp['titleaddress']);
		$xtpl->parse('main.login');
	}



	$xtpl->parse("main");
	$xtpl->out("main"); 