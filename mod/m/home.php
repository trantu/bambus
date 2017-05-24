<?php
if(!defined('SECURITY')) exit('404 - Not Access');



$xtpl = new XTemplate(TEMPLATE.'m/home.tpl');
$time=$config['time_in_web'];

	unset($_SESSION['Email']);
	unset($_SESSION['idUser']);
	foreach ($time as $key => $value) {
		$xtpl->assign("DAY",$key);
		$xtpl->assign("TIME",$value);
		$xtpl->parse("main.rowtime");
	}

	$address=$config['address_store'];
	$xtpl->assign("NAMESTORE",$address['name']);
	$xtpl->assign("ADDRESSSTORE",$address['address']);
	$xtpl->assign('REGIONSTORE',$address['region']);
	$xtpl->parse("main.addressstore");

	$telephone=$config['telephone_store'];
	$email=$config['email_store'];
	$xtpl->assign("TELEPHONE",$telephone);
	$xtpl->assign("EMAILCONTACT",$email);
	$xtpl->parse("main.contactus");
	
	$xtpl->assign('HOME',$home['menu']['home']);
	$xtpl->assign('ABOUT',$home['menu']['about']);
	$xtpl->assign('MENU',$home['menu']['menu']);
	$xtpl->assign('CONTACT',$home['menu']['contact']);
	$xtpl->assign('ENTERSTRESS',$home['enter_stress']);
	$xtpl->assign('BUTTONSTRESS',$home['button_stress']);
	$xtpl->assign('TEXTLOGINREGISTER',$home['text_register_login']);
	$xtpl->assign('BUTTONLOGINREGISTER',$home['sigin']['login']);
	$xtpl->assign('PLACEHOLDER',$home['placeholder_stress']);


/*
*
*Sign in langue
*
*/

	$xtpl->assign('SGTITLE',$main['sigin']['title']);
	$xtpl->assign('SGTITLEP',$main['sigin']['titlep']);
	$xtpl->assign('SGTITLEREGISTER',$main['sigin']['titleregister']);
	$xtpl->assign('SGEMAIL',$main['sigin']['email']);
	$xtpl->assign('SGEMAILP',$main['sigin']['emailplace']);
	$xtpl->assign('SGPASSWORD',$main['sigin']['password']);
	$xtpl->assign('SGPASSWORDP',$main['sigin']['passwordplace']);
	$xtpl->assign('SGFGPASS',$main['sigin']['fgpassword']);
	$xtpl->assign('SGBTSIGNUP',$main['sigin']['btsignup']);
	$xtpl->assign('SGBTRGTER',$main['sigin']['btrgter']);
	$xtpl->assign('SGERROR',$main['sigin']['error']);



/*
*
*Forget password langue
*
*/
	$xtpl->assign('FGTITLE',$main['forget']['title']);
	$xtpl->assign('FGPLACE',$main['forget']['placeholder']);
	$xtpl->assign('FGBUTTON',$main['forget']['button']);
	$xtpl->assign('FGSUCCESS',$main['forget']['success']);
	$xtpl->assign('FGERROR',$main['forget']['error']);
	


$xtpl->parse('main');
$xtpl->out('main');