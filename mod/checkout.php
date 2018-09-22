<?php 
#gio hang chi tiet
#nhap dia chi hoac lay dia chi tu dang nhap
# chuyen sang paypal
if(!defined('SECURITY')) exit('404 - Not Access'); 
$rule=new Rule;
$xtpl=new XTemplate(TEMPLATE.'checkout.tpl');
require_once("j_all.php");
require_once("all.php");
$all=new All;
$j_all=new j_all;
$xtpl->assign('LANGUAGECHECKOUT',$de_checkout);
$xtpl->assign('LANGUAGEREGISTER',$de_register);
$xtpl->assign('LANGUAGECART',$de_cart);
$xtpl->assign('LANGUAGEMAIN',$de_main);

$xtpl->assign('FORM_LOGO',$config['cart_logo']);
$xtpl->assign('TITLE',$config['namestore']);
$xtpl->assign('FAVICON_ICO',$config['favicon_ico']);

if(!isset($_SESSION['price_distance']) && !isset($_SESSION['Email'])){
	header("location:index.php?mod=main");
}
  
 //$xtpl->assign('KHOANGCACH',$_SESSION['distance_deliver']); // Xuất ra aler xem
 //$xtpl->assign('TIENKHOANGCACH',$_SESSION['price_distance']);
if(isset($_SESSION['addresold'])){
	$address_old=$_SESSION['addresold'];
	$xtpl->assign("ADDRESSOLD",$address_old);
}

unset($_SESSION['total_PP']);
if(isset($_SESSION['price_distance'])){
	$xtpl->assign("PRICEMIN",$_SESSION['price_distance']);
}

include('inc/header.php');

// Cancel payment => clear this flag will not show successful popup
if(isset($_SESSION['alert_paid']))
{
    unset($_SESSION['alert_paid']);
}

# Xứ lý session price_distance
if(isset($_SESSION['Email']))
{
	$display_form_address='display:none'; # Trang thai hien thi form nhap dia chi
	//$text_position_login='<a href="index.php?mod=p_infouser"> My Account </a>|<p><a href="index.php?mod=logout">Logout</a></p>';
	$xtpl->assign("DISPLAYFORMADDRESS",$display_form_address);
	//$xtpl->assign("TEXTPOSITIONLOGIN",$text_position_login);
	#thông tin user để mua hàng
	$rowuser=$j_all->infoUser($_SESSION['Email']);
	if(count($rowuser)>0)
	{
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

		$xtpl->parse("main.login");
		$address_price_rule=$rowuser['Postalcode'].$rowuser['Numberhouse'].$rowuser['Stress'].$rowuser['Region'];
		/*$check_stress=$rule->getPrice($config['address'],$config["price"],$address_price_rule);
		if($check_stress==false){
			$xtpl->assign("PRICEMIN",'Address Error');
		}

		if(isset($_SESSION['price_distance'])){
			$xtpl->assign("PRICEMIN",$_SESSION['price_distance']);
		}*/
	}
}
// Chưa login
else{
	$address_notlogin=$_SESSION['addresold'];
	echo $_SESSION['addresold'];
	$url_enc=urlencode($address_notlogin);
	$arr_google_address=json_decode(file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?key='.API_KEY.'&address=".$url_enc));
	// echo "<pre>";
	// print_r($arr_google_address);

	// echo "</pre>";
	// Gán gtri NULL cho địa chỉ
	$number_house_notlogin = "";
	$stress_notlogin = "";
	$region_notlogin = "";
	$postal_code_notlogin = "";
	if(isset($arr_google_address->results[0]->address_components)){
		// echo "<pre>";
		// print_r($arr_google_address->results[0]->address_components);
		// echo "</pre>";
		$arr_google_address_cp=$arr_google_address->results[0]->address_components;
		foreach ($arr_google_address_cp as  $value) {
			if( in_array('postal_code',$value->types) ){
				$postal_code_notlogin = $value->long_name;
				//echo $postal_code_notlogin;
			}
			if( in_array('locality',$value->types) ){
				$region_notlogin = $value->long_name;
				//echo $region_notlogin;
			}
			if( in_array('street_number',$value->types) ){
				$number_house_notlogin = $value->long_name;
				//echo $number_house_notlogin;
			}
			if( in_array('route',$value->types) ){
				$stress_notlogin = $value->long_name;
				//echo $stress_notlogin;
			}

		}

	}
	
	// Kiểm tra tồn tại
	//if(isset($arr_google_address))
	$xtpl->assign("NUMBERHOUSEUSER",$number_house_notlogin);
	$xtpl->assign("POSTALCODEUSER",$postal_code_notlogin);
	$xtpl->assign("REGIONUSER",$region_notlogin);
	$xtpl->assign("STRESSUSER",$stress_notlogin);

	$xtpl->assign("ADDRESSNOTLOGIN",$address_notlogin);
	$xtpl->parse("main.notlogin");
}


#lay tong tien mon an
	$total_temp=(isset($_SESSION['total']))? $_SESSION['total']:0;
	$total=number_format($total_temp,2,',','.');
	$xtpl->assign("TOTALCART",$total);
	$total_dishis=(isset($_SESSION['total_dishis']))? $_SESSION['total_dishis']:0;
	$xtpl->assign("TOTALDISHISCART",$total_dishis);	

	#Hiện giỏ hàng chi tiết
	if(isset($_SESSION['arrSP'])){
		$arrSP_cart=$_SESSION['arrSP'];
		if(count($arrSP_cart)>0){
			foreach ($arrSP_cart as $row) {
				$xtpl->assign("QTY",$row['qty']);
				$xtpl->assign("IDSP",$row['idSP']);
				//echo $row['idSP'];
				$name=$all->getDishes_Dish($row['plu']);
				$xtpl->assign('IMAGE',$name['Online_Bild']);
				$xtpl->assign('NAME',$row['name']);
				$xtpl->assign('NOTE',$row['note']);
				$str=$row['price']*$row['qty'];
				$price_s=number_format($str,2,',','.');
				$xtpl->assign("PRICES",$price_s);
				$str1=$row['price'];
				$price_s1=number_format($str1,2,',','.');
				$xtpl->assign('PRICE',$price_s1);
				$xtpl->assign("ICONPRICE",$config['iconprice']);
				if(isset($row['Beilage'])==true){
					$xtpl->assign("BEILAGE",$row['Beilage']);
				}
				else {
					$xtpl->assign("BEILAGE",'');
				}

				$xtpl->assign("STTPP",$_SESSION['countpp']);
				$xtpl->parse("main.cart");
			}
		}
	}

	$xtpl->assign('LANGUAGEMENU',$de_menu);
	$xtpl->assign('LANGUAGEFOOTER',$de_footer);
	$xtpl->assign('LANGUAGELOGIN',$de_login);

	$xtpl->assign_file("TEMPLATEHEADER",TEMPLATE.'header/header.tpl');
	$xtpl->assign_file("TEMPLATEFOOTER",TEMPLATE.'footer/footer.tpl');	
	$xtpl->assign_file("TEMPLATELOGIN",TEMPLATE.'login/login.tpl');	
	$xtpl->assign("ICONPRICE",$config['iconprice']);


/*
*
* hiển thị hình ảnh của web
*thay doi trong file config.rule.php
*/	
	if($config['wdisplayimggruppe']==0){
		$xtpl->parse("main.checkimggruppe");
	}

	if($config['wdisplayimgdishis']==0){
			$xtpl->parse("main.checkimgdishis");
	}


$xtpl->parse("main");
$xtpl->out("main");

## paypal gui mail dang lam 

 ?>