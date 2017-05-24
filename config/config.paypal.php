<?php 
if(!defined('SECURITY')) exit('404 - Not Access');

require_once("settings.rule.php");

    $settings=new  settings;
    $data=$settings->getSettings();

foreach ($data as $da){
    switch ($da['Name']) {
        case "business":
            $paypal['business'] 			=$da['Value'];
            break;
        default:
            break;
    }

}

	$http="http://";
	//$paypal['business'] 			= 'khai-facilitator@hqtech.de';//dia chi email paypal nhan tien
	$paypal['cpp_header_image'] 	= ''; //Image header url [750 pixels wide by 90 pixels high]
	$paypal['return'] 				= $http.site_url.'?mod=paypal_sendmail';
	$paypal['cancel_return'] 		= $http.site_url.'?mod=checkout'; //checkout
	$paypal['notify_url'] 			= $http.site_url.'?mod=paypal_process'; //IPN Post
	$paypal['production'] 			= TRUE; //Its false by default and will use sandbox
	$paypal['discount_rate_cart'] 	= 0; //This means 20% discount
	$paypal["invoice"]				= md5(uniqid(time())); //The invoice id
	$paypal["currency_code"] = 'EUR';////http://bit.ly/anciiH
?>