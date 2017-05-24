<?php if(!defined('SECURITY')) exit('404 - Not Access');

	$rule=new Rule;
	//$address=$_POST['address'];
	$price=$rule->getPrice($config['address'],$config["price"]);
	echo $price;
	//$_SESSION['price_distance']=$price;
 ?>