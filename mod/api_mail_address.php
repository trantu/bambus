<?php  
#api gửi mail address cho mobile
if(!defined('SECURITY')) exit('404 - Not Access'); 	
	$xtpl=new XTemplate(TEMPLATE.'api_mail_address.tpl');
	$address=$_POST['address'];           
	$xtpl->assign('NAME',$address['name']);
	$xtpl->assign("NUMBERHOUSE",$address['numberhouse']);
	$xtpl->assign("STRESS",$address['stress']);
	$xtpl->assign('REGION',$address['region']);
	$xtpl->assign('PHONE',$address['phone']);
	$xtpl->assign('NOTEPOSITION',$address['noteposition']);
	$xtpl->assign('COMPANY',$address['company']);
	$xtpl->assign('POSTALCODE',$address['postalcode']);
	$xtpl->assign('NOTE',$address['note']);

	$xtpl->parse('main.address');

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

	$xtpl->parse("main");
	$xtpl->out("main"); 