<?php 

#Tính khoảng cách khi nhập địa chỉ đường của khách hàng
# thực hiện theo file autogoogle.js
# Lưu session khoảng cách theo số tiền.tính từ điểm start và config theo tiền trong file config

if(!defined('SECURITY')) exit('404 - Not Access');
$rule= new Rule;
if(isset($_POST['address'])){
	//$enter_address=addslashes($_POST['address']);
	$start=$config['address'];
	$config_price=$config["price"];
	$price=$rule->getPrice($start,$config_price);
	if(!$price){
		echo 0;
	}
	else {echo 1;}
}


 ?>