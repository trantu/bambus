<?php  
#lay dia chi mail de gui mail cho admin
if(!defined('SECURITY')) exit('404 - Not Access'); 	
	$xtpl=new XTemplate(TEMPLATE.'mail_address.tpl');
	$address=$_POST['address'];           

	if (isset($address['login'])) {
		$address['email_login']=$address['email_cus'];
	}

    $address['first_number']= "";
/*
    if (isset($address['phone'])) {
		$address['first_number']=substr(trim($address['phone']),0,3);
	}
*/

	$address['email']=$address['email_cus'];
	$address['distance_deliver']=$address['distance_deliver'];
	//loai thanh toan
	$ar_zahlung=array(1=>'Cash',2=>'Paypal','3'=>'Credit card','4'=>'MobileEC');
	$address['type_payment']=$ar_zahlung[$address['type_payment']];
	//gioi tinh
	$ar_anrede=array(0=>'Frau',1=>'Herr');
	$address['sex']=$ar_anrede[$address['sex']];

	$xtpl->assign('DATASEND',$address);

	$xtpl->parse("main");
	$xtpl->out("main"); 