<?php if(!defined('SECURITY')) exit('404 - Not Access');
$xtpl=new XTemplate(TEMPLATE.'m/cart.tpl');

if(!isset($_SESSION['arrSP'])) {
    $_SESSION['arrSP']= array();
}
if(!isset($_SESSION['total'])) {
    $_SESSION['total']= 0;
}

if(!isset($_SESSION['total_dishis'])) {
    $_SESSION['total_dishis']= 0;
}



/*if(isset($_SESSION['Email'])==true){
	$xtpl->assign('EMAIL',$_SESSION['Email']);
	$xtpl->assign('SACCOUT',$main['sigin']['myaccount']);
	$xtpl->assign('SLOGUOT',$main['sigin']['logout']);
	$xtpl->parse("main.loginsession");
}
else { 	
	header("location:index.php?mod=m/main");
}*/


foreach ($_SESSION['arrSP'] as $row) {

	$xtpl->assign("QTY",$row['qty']);
	$xtpl->assign("IDSP",$row['idSP']);
	$xtpl->assign('NAME',$row['name']);
	$xtpl->assign('PRICE',$row['price']);
 	$total_d=$row['price']*$row['qty'];
	$price_s=number_format($total_d,2,',','.'); 
	$xtpl->assign("PRICES",$price_s);
	$xtpl->assign("ICONPRICE",$config['iconprice']);
	if(isset($row['Beilage'])==true){
		$xtpl->assign("BEILAGE",$row['Beilage']);
	}
	else {
		$xtpl->assign("BEILAGE",'');
	}
	$xtpl->parse('main.cart');

}
	$totos=number_format($_SESSION['total'],2,',','.');
	$xtpl->assign("TOTAL",$totos);


/*
*
*in footter
*
*/	
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

/*
* CART LANGUE
*/
	$xtpl->assign("CBUTTON",$cart['button']);
	$xtpl->assign("CSUMME",$main['cart']['summe']);
	$xtpl->assign("CQTY",$main['cart']['qty']);
	$xtpl->assign("PRICEMIN",$_SESSION['price_distance']);
	$xtpl->assign("PRICEMINTITLE",$main['priceorder_title']);

	$xtpl->parse('main');
	$xtpl->out("main");


 ?>